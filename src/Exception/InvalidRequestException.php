<?php
/**
 * User: nemishkor
 * Date: 28.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\Exception;


use Exception;
use Throwable;

class InvalidRequestException extends Exception {

    private $content;

    public function __construct($content, $message = "", $code = 0, Throwable $previous = null) {
        $this->content = $content;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

}
