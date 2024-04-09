<?php

class Utils {
    /**
     * @param string $username
     * @return bool
     */
    public static function validUserName($username) {
        return !!preg_match("/^[a-zA-Z0-9 ]{5,10}$/", $username);
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function validName($name) {
        return !!preg_match("/^[a-zA-Z ]{10,20}$/", $name);
    }

    /**
     * @param string $password
     * @return bool
     */
    public static function validPassword($password) {
        return !!preg_match("/^[a-zA-Z0-9 ]{5,10}$/", $password);
    }

    /**
     * @param string $address
     * @return bool
     */
    public static function validAddress($address) {
        return !!preg_match("/^[a-zA-Z0-9,. ]{10,50}$/", $address);
    }

    /**
     * @param string $level
     * @return bool
     */
    public static function validLevel($level) {
        return !!preg_match("/^[1-2]{1,1}$/", $level);
    }

    /**
     * @param array $checkboxes
     * @return array
     */
    public static function checked($checkboxes) {
        $checked = [];
        if ($checkboxes) {
            foreach ($checkboxes as $checkbox) {
                if ($checkbox['checked']) {
                    $checked[] = $checkbox['value'];
                }
            }
        }
        return $checked;
    }
}
