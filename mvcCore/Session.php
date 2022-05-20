<?php
/**
 * User: PaulTung
 * Date: 7/24/2020
 * Time: 11:18 PM
 */

namespace app\mvcCore;


/**
 * Class Session
 *
 * @author  Paul Dong <paul@calgah.com>
 * @package app\mvcCore
 */
class Session
{
  protected const FLASH_KEY = 'flash_messages';
  protected const WARNING_KEY = 'warning_messages';
  protected const ERROR_KEY = 'error_messages';

  public function __construct()
  {
    session_start();
    $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
    $warningMessages = $_SESSION[self::WARNING_KEY] ?? [];
    $errorMessages = $_SESSION[self::ERROR_KEY] ?? [];
    foreach ($flashMessages as $key => &$flashMessage) {
      $flashMessage['remove'] = true;
    }
    foreach ($warningMessages as $key => &$warningMessage) {
      $warningMessage['remove'] = true;
    }
    foreach ($errorMessages as $key => &$errorMessage) {
      $errorMessage['remove'] = true;
    }
    $_SESSION[self::FLASH_KEY] = $flashMessages;
    $_SESSION[self::WARNING_KEY] = $warningMessages;
    $_SESSION[self::ERROR_KEY] = $errorMessages;
  }

  public function setFlash($key, $message)
  {
    $_SESSION[self::FLASH_KEY][$key] = [
      'remove' => false,
      'value' => $message
    ];
  }

  public function getFlash($key)
  {
    return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
  }

  public function setWarning($key, $message)
  {
    $_SESSION[self::WARNING_KEY][$key] = [
      'remove' => false,
      'value' => $message
    ];
  }

  public function getWarning($key)
  {
    return $_SESSION[self::WARNING_KEY][$key]['value'] ?? false;
  }

  public function setError($key, $message)
  {
    $_SESSION[self::ERROR_KEY][$key] = [
      'remove' => false,
      'value' => $message
    ];
  }

  public function getError($key)
  {
    return $_SESSION[self::ERROR_KEY][$key]['value'] ?? false;
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    return $_SESSION[$key] ?? false;
  }

  public function remove($key)
  {
    unset($_SESSION[$key]);
  }

  public function __destruct()
  {
    $this->removeOldMessages();
  }

  private function removeOldMessages()
  {
    $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
    foreach ($flashMessages as $key => $flashMessage) {
      if ($flashMessage['remove']) {
        unset($flashMessages[$key]);
      }
    }
    $_SESSION[self::FLASH_KEY] = $flashMessages;

    $warningMessages = $_SESSION[self::WARNING_KEY] ?? [];
    foreach ($warningMessages as $key => $warningMessage) {
      if ($warningMessage['remove']) {
        unset($warningMessages[$key]);
      }
    }
    $_SESSION[self::WARNING_KEY] = $warningMessages;

    $errorMessages = $_SESSION[self::ERROR_KEY] ?? [];
    foreach ($errorMessages as $key => $errorMessage) {
      if ($errorMessage['remove']) {
        unset($errorMessages[$key]);
      }
    }
    $_SESSION[self::ERROR_KEY] = $errorMessages;
  }
}