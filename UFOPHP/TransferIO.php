<?php

namespace UFOPHP;

/**
 * 通用编码/解码，输入输出类
 *
 * @author Kang Kai
 */
class TransferIO {

    protected $format = 'json';

    public function __construct($format = NULL) {
        if ($format) {
            $this->format = $format;
        }
    }

    /**
     * 解码POST来的数据
     * @return mixed 解码后的数据
     */
    public function decodeInput() {
        $input_data = file_get_contents("php://input");
        if ($this->format == 'json') {
            $data = json_decode($input_data, true);
        } elseif ($this->format == 'xml') {
            //$data = $input_data;
        } else {
            $data = $_POST;
        }
        return $data;
    }

    /**
     * 编码输出数据
     * @param mixed $data 编码数据
     * @return string 编码后的数据
     */
    public function encodeOutput($data, $format = NULL) {
        if (!isset($format)) {
            $format = $this->format;
        }
        $type_map = array(
            'json' => 'application/json',
            'xml' => 'text/xml',
            '' => 'multipart/form-data'
        );
        if (isset($type_map[$format])) {
            header('Content-Type: ' . $type_map[$format]);
        }
        echo $this->encodeData($data, $format);
    }

    /**
     * 编码数据
     * @param mixed $data 编码数据
     * @return string 编码后的数据
     */
    public function encodeData($data, $format = NULL) {
        if ($format == 'json') {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        } elseif ($format == 'xml') {
            $data = xml_encode($data, 'data');
        } else {
            $data = $this->_paramsEncode($data);
        }
        return $data;
    }

    /**
     * 按http form格式编码数据
     * @param type $data
     * @return type
     */
    protected function _paramsEncode($data) {
        $pieces = array();
        foreach ($data as $key => $value) {
            $pieces[] = urlencode($key) . '=' . urlencode($value);
        }
        return implode('&', $pieces);
    }

}
