<?php
require_once __DIR__ . '/config.php';

// ฟังก์ชันช่วยแปลง type อัตโนมัติ
function get_param_types($data) {
    $types = '';
    foreach ($data as $value) {
        if (is_int($value)) {
            $types .= 'i';
        } elseif (is_double($value)) {
            $types .= 'd';
        } else {
            $types .= 's';
        }
    }
    return $types;
}

// CREATE
function db_create($table, $data) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) return false;
    $fields = implode(',', array_keys($data));
    $placeholders = implode(',', array_fill(0, count($data), '?'));
    $types = get_param_types($data);
    $stmt = $conn->prepare("INSERT INTO $table ($fields) VALUES ($placeholders)");
    $stmt->bind_param($types, ...array_values($data));
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// READ (by primary key)
function db_read($table, $pk_field, $pk_value) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) return null;
    $stmt = $conn->prepare("SELECT * FROM $table WHERE $pk_field = ?");
    $type = get_param_types([$pk_value]);
    $stmt->bind_param($type, $pk_value);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $row;
}

// UPDATE (by primary key)
function db_update($table, $data, $pk_field, $pk_value) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) return false;
    $fields = implode('=?, ', array_keys($data)) . '=?';
    $types = get_param_types($data) . get_param_types([$pk_value]);
    $stmt = $conn->prepare("UPDATE $table SET $fields WHERE $pk_field = ?");
    $params = array_merge(array_values($data), [$pk_value]);
    $stmt->bind_param($types, ...$params);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// DELETE (by primary key)
function db_delete($table, $pk_field, $pk_value) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) return false;
    $type = get_param_types([$pk_value]);
    $stmt = $conn->prepare("DELETE FROM $table WHERE $pk_field = ?");
    $stmt->bind_param($type, $pk_value);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}
?>