<?php

namespace App\Factory;

use stdClass;
use Error;

class Artifact
{
    public const PLAIN = 1;
    public const JSON = 2;
    public const XML = 3;
    public const HTML = 4;
    public const WHITE_LIST_CODE = [200, 201, 202];
    private const POWERED_BY = 'MP CREATIVE STUDIO';

    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return \React\Http\Response
     */
    private static function plainResponse($code, $message)
    {
        http_response_code($code);
        header("Content-Type: text/plain");
        header("X-Powered-By: " . self::POWERED_BY);
        file_put_contents("php://output", $message);
    }
    private static function htmlResponse($code, $message)
    {
        http_response_code($code);
        header("Content-Type: text/html");
        header("X-Powered-By: " . self::POWERED_BY);
        file_put_contents("php://output", $message);
    }
    private static function jsonResponse($code, $message, $data)
    {
        $res = [
            'status' => false,
            'message' => $message,
        ];
        if (in_array($code, self::WHITE_LIST_CODE)) $res['status'] = true;

        if ($data instanceof stdClass || is_array($data)) $res['data'] = json_encode($data);
        elseif (is_int($data) || is_string($data) || is_bool($data) || is_null($data)) $res['data'] = $data;
        http_response_code($code);
        header("Content-Type: application/json");
        header("X-Powered-By: " . self::POWERED_BY);
        file_put_contents("php://output", json_encode($res));
    }
    private static function xmlResponse($code, $message, $data)
    {
        $res = [
            'status' => false,
            'message' => $message,
        ];
        if (in_array($code, self::WHITE_LIST_CODE)) $res['status'] = true;
        if ($data instanceof stdClass || is_array($data) || is_int($data) || is_string($data) || is_bool($data) || is_null($data)) $res['data'] = $data;
        http_response_code($code);
        header("Content-Type: application/xml");
        header("X-Powered-By: " . self::POWERED_BY);
        file_put_contents("php://output", json_encode($res));
    }
    private static function checkType($type, stdClass $property)
    {
        if ($property == null) {
            throw new Error("Property require to create a response");
        }
        if ($type == Artifact::PLAIN) {
            return self::plainResponse($property->code, $property->message);
        } else if ($type == Artifact::HTML) {
            return self::htmlResponse($property->code, $property->message);
        } else if ($type == Artifact::JSON) {
            return self::jsonResponse($property->code, $property->message, $property->data);
        } else if ($type == Artifact::XML) {
            return self::xmlResponse($property->code, $property->message, $property->data);
        } else {
            throw new Error("Unknown response type");
        }
    }
    static function responseFromAccept($accept)
    {
        if (is_null($accept)) $accept = '';
        elseif (!is_array($accept) && isset($accept)) $accept = [$accept];
        if (in_array("application/json", $accept) || in_array("text/json", $accept)) {
            return self::JSON;
        } elseif (in_array("application/xml", $accept) || in_array("text/xml", $accept)) {
            return self::XML;
        } elseif (in_array("test/html", $accept) || in_array("text/xhtml", $accept)) {
            return self::HTML;
        } else {
            return self::PLAIN;
        }
    }
    static function generic($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 200;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    static function html($message, $code = 200)
    {
        $property = new stdClass;
        $property->code = $code;
        $property->message = $message;
        return self::checkType(Artifact::HTML, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function created($message, $data = null, $type = Artifact::JSON)
    {

        $property = new stdClass;
        $property->code = 201;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function processing($message, $data = null, $type = Artifact::JSON)
    {

        $property = new stdClass;
        $property->code = 202;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function badRequest($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 400;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function nonAuthorization($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 401;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function unAuthorized($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 403;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }

    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function notFound($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 404;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }


    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function methodNotAllowed($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 405;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function unprocessEntity($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 422;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function serverError($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 500;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }

    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function badGateway($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 503;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
    /**
     * @param mixed $message

     * @param mixed|null $data

     * @return Response
     */
    static function upstreamError($message, $data = null, $type = Artifact::JSON)
    {
        $property = new stdClass;
        $property->code = 503;
        $property->message = $message;
        $property->data = $data;
        return self::checkType($type, $property);
    }
}
