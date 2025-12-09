<?php

class Form {

    private $action;
    private $submitText;
    private $fields = [];

    public function __construct($action = "", $submitText = "Simpan") {
        $this->action = $action;
        $this->submitText = $submitText;
    }

    // Tambah field
    public function addField($name, $label, $type = "text") {
        $this->fields[] = [
            'name'  => $name,
            'label' => $label,
            'type'  => $type
        ];
    }

    // Tampilkan form
    public function displayForm() {
        echo "<form method='POST'>";

        foreach ($this->fields as $field) {
            echo "<label>{$field['label']}</label><br>";

            if ($field['type'] == "textarea") {
                echo "<textarea name='{$field['name']}' rows='5'></textarea><br><br>";
            } else {
                echo "<input type='{$field['type']}' name='{$field['name']}'><br><br>";
            }
        }

        echo "<button type='submit'>{$this->submitText}</button>";
        echo "</form>";
    }
}
