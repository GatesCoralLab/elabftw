<?php
/**
 * app/controllers/ItemsTypesController.php
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
 * Deal with ajax requests sent from the admin page
 *
 */
try {
    require_once '../../inc/common.php';
    $itemsTypes = new ItemsTypes($_SESSION['team_id']);

    // CREATE ITEMS TYPES
    if (isset($_POST['itemsTypesCreate'])) {
        $itemsTypes->create(
            $_POST['itemsTypesName'],
            $_POST['itemsTypesColor'],
            $_POST['itemsTypesTemplate']
        );
    }

    // UPDATE ITEM TYPE
    if (isset($_POST['itemsTypesUpdate'])) {
        $itemsTypes->update(
            $_POST['itemsTypesId'],
            $_POST['itemsTypesName'],
            $_POST['itemsTypesColor'],
            $_POST['itemsTypesTemplate']
        );
    }

    // DESTROY ITEM TYPE
    if (isset($_POST['itemsTypesDestroy'])) {
        $itemsTypes->destroy($_POST['itemsTypesId']);
    }

} catch (Exception $e) {
    $Logs = new Logs();
    $Logs->create('Error', $_SESSION['userid'], $e->getMessage());
}
