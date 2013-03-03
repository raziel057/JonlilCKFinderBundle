<?php
/**
 * User: jonas
 * Date: 2013-03-03
 * Time: 11:27
 *
 * Use with love
 */

namespace Jonlil\CKFinderBundle\Connector;

use Symfony\Component\HttpFoundation\Request;


class s3
{
    protected $parameters;
    protected $request;

    public function __construct(Request $request, array $parametes = array())
    {
        $this->parameters = $parametes;
        $this->request = $request;

        define('IN_CKFINDER', true);
        define('CKFINDER_CONNECTOR_ERROR_NONE',0);
        define('CKFINDER_CONNECTOR_ERROR_CUSTOM_ERROR',1);
        define('CKFINDER_CONNECTOR_ERROR_INVALID_COMMAND',10);
        define('CKFINDER_CONNECTOR_ERROR_TYPE_NOT_SPECIFIED',11);
        define('CKFINDER_CONNECTOR_ERROR_INVALID_TYPE',12);
        define('CKFINDER_CONNECTOR_ERROR_INVALID_NAME',102);
        define('CKFINDER_CONNECTOR_ERROR_UNAUTHORIZED',103);
        define('CKFINDER_CONNECTOR_ERROR_ACCESS_DENIED',104);
        define('CKFINDER_CONNECTOR_ERROR_INVALID_EXTENSION',105);
        define('CKFINDER_CONNECTOR_ERROR_INVALID_REQUEST',109);
        define('CKFINDER_CONNECTOR_ERROR_UNKNOWN',110);
        define('CKFINDER_CONNECTOR_ERROR_CREATED_FILE_TOO_BIG',111);
        define('CKFINDER_CONNECTOR_ERROR_ALREADY_EXIST',115);
        define('CKFINDER_CONNECTOR_ERROR_FOLDER_NOT_FOUND',116);
        define('CKFINDER_CONNECTOR_ERROR_FILE_NOT_FOUND',117);
        define('CKFINDER_CONNECTOR_ERROR_SOURCE_AND_TARGET_PATH_EQUAL',118);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_FILE_RENAMED',201);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_INVALID',202);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_TOO_BIG',203);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_CORRUPT',204);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_NO_TMP_DIR',205);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_WRONG_HTML_FILE',206);
        define('CKFINDER_CONNECTOR_ERROR_UPLOADED_INVALID_NAME_RENAMED', 207);
        define('CKFINDER_CONNECTOR_ERROR_MOVE_FAILED',300);
        define('CKFINDER_CONNECTOR_ERROR_COPY_FAILED',301);
        define('CKFINDER_CONNECTOR_ERROR_DELETE_FAILED',302);
        define('CKFINDER_CONNECTOR_ERROR_ZIP_FAILED',303);
        define('CKFINDER_CONNECTOR_ERROR_CONNECTOR_DISABLED',500);
        define('CKFINDER_CONNECTOR_ERROR_THUMBNAILS_DISABLED',501);

        define('CKFINDER_CONNECTOR_DEFAULT_USER_FILES_PATH', $this->parameters['userfiles']);
        define('CKFINDER_CONNECTOR_LANG_PATH', $this->parameters['path'] . "/core/connector/s3/lang");
        define('CKFINDER_CONNECTOR_CONFIG_FILE_PATH', __DIR__ . "/../config.php");

        if (version_compare(phpversion(), '6', '>=')) {
            define('CKFINDER_CONNECTOR_PHP_MODE', 6);
        }
        else {
            define('CKFINDER_CONNECTOR_PHP_MODE', 5);
        }

        define('CKFINDER_CONNECTOR_LIB_DIR', $this->parameters['path'] . "/core/connector/s3/php5");

        define('CKFINDER_CHARS', '123456789ABCDEFGHJKLMNPQRSTUVWXYZ');
        define('CKFINDER_REGEX_IMAGES_EXT', '/\.(jpg|gif|png|bmp|jpeg)$/i');
        define('CKFINDER_REGEX_INVALID_PATH', ",(/\.)|[[:cntrl:]]|(//)|(\\\\)|([\\:\*\?\"\<\>\|]),");
        define('CKFINDER_REGEX_INVALID_FILE', ",[[:cntrl:]]|[/\\:\*\?\"\<\>\|],");


        $this->req();
    }

    protected function req ()
    {
        require_once CKFINDER_CONNECTOR_LIB_DIR . "/CommandHandler/CommandHandlerBase.php";
        /**
         * singleton factory
         */
        require_once CKFINDER_CONNECTOR_LIB_DIR . "/Core/Factory.php";
        /**
         * utils class
         */
        require_once CKFINDER_CONNECTOR_LIB_DIR . "/Utils/Misc.php";
        /**
         * hooks class
         */
        require_once CKFINDER_CONNECTOR_LIB_DIR . "/Core/Hooks.php";

        $utilsSecurity =& \CKFinder_Connector_Core_Factory::getInstance("Utils_Security");
        $utilsSecurity->getRidOfMagicQuotes();

        require_once CKFINDER_CONNECTOR_CONFIG_FILE_PATH;

        \CKFinder_Connector_Core_Factory::initFactory();
        $connector =& \CKFinder_Connector_Core_Factory::getInstance("Core_Connector");

        if($this->request->query->has('command')) {
            $connector->executeCommand($this->request->query->get('command'));
        } else {
            $connector->handleInvalidCommand();
        }
    }
}
