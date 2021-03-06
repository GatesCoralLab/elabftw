<?php
/**
 * app/controllers/CommentsController.php
 *
 * @author Nicolas CARPi <nicolas.carpi@curie.fr>
 * @copyright 2012 Nicolas CARPi
 * @see http://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 */
namespace Elabftw\Elabftw;

use Exception;

/**
 * Controller for the experiments comments
 *
 */
try {
    require_once '../../inc/common.php';
    $Comments = new Comments(new Experiments($_SESSION['userid']), $_POST['id']);

    // CREATE
    if (isset($_POST['commentsCreate'])) {
        $Comments->Experiments->setId($_POST['id']);
        if ($Comments->create($_POST['comment'])) {
            echo '1';
        } else {
            echo '0';
        }
    }

    // UPDATE
    if (isset($_POST['commentsUpdateComment'])) {
        if ($Comments->update($_POST['commentsUpdateComment'])) {
            echo '1';
        } else {
            echo '0';
        }
    }

    // DESTROY
    if (isset($_POST['commentsDestroy'])) {
        if ($Comments->destroy()) {
            echo '1';
        } else {
            echo '0';
        }
    }

} catch (Exception $e) {
    $Logs = new Logs();
    $Logs->create('Error', $_SESSION['userid'], $e->getMessage());
}
