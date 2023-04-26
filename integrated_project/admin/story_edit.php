<?php
require "../etc/config.php";

try {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!$_SERVER["REQUEST_METHOD"] === "GET") {
        throw new Exception("Invalid request");
    }
    else if (!isset($_GET["id"])) {
        throw new Exception("Wine id expected");
    }

    $id = $_GET["id"];
    $wine = Wine::findById($id);

    if ($wine === null) {
        throw new Exception("Wine id not found");
    }

    $wineGrapeVarietyIds = explode(",", $wine->grape_varieties);

    $wineries = Winery::findAll();
    $grapeVarieties = GrapeVariety::findAll();
}
catch (Exception $e) {
    die($e->getMessage());
}
?>
<html>
    <head>
        <title>Admin - Edit new wine</title>
        <link rel="stylesheet" href="../css/main.css" />
    </head>
    <body class="container">
            <?php require "./include/flash.php"; ?>
        <h1>Admin - Edit wine</h1>
        <form method="POST" action="wine_update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $wine->id ?>" />
            <div class="row">
                <div class="column-2">
                    <label for="name">Name</label>
                    <input type="text"
                        id="name"
                        name="name"
                        placeholder="Name..."
                        value="<?= old("name", $wine->name) ?>"
                        />
                    <div class="error"><?= error("name") ?></div>


                    <label for="year">Year</label>
                    <input type="text"
                        id="year"
                        name="year"
                        placeholder="Year..."
                        value="<?= old("year", $wine->year) ?>"
                        />
                    <div class="error"><?= error("year") ?></div>


                    <label for="price">Price</label>
                    <input type="text"
                        id="price"
                        name="price"
                        placeholder="Price..."
                        value="<?= old("price", $wine->price) ?>"
                        />
                    <div class="error"><?= error("price") ?></div>


                    <label for="description">Description</label>
                    <textarea id="description"
                            name="description"
                            placeholder="Description..."><?= old("description", $wine->description) ?></textarea>
                    <div class="error"><?= error("description") ?></div>


                    <label for="winery_id">Winery</label>
                    <select id="winery_id" name="winery_id">
                        <?php foreach ($wineries as $w) { ?>
                            <option value="<?= $w->id ?>"
                                    <?= (chosen("winery_id", $w->id, $wine->winery_id) ? "selected" : "") ?>
                                    >
                            <?= $w->name ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div class="error"><?= error("winery_id") ?></div>


                    <label for="grapeVarieties">Grape varieties</label><br/>
                    <div class="checkbox">
                    <?php foreach ($grapeVarieties as $gv) { ?>
                        <span class="checkbox">
                            <input type="checkbox"
                                name="grape_varieties[]"
                                id="grape_variety-<?= $gv->id ?>"
                                value="<?= $gv->id ?>"
                                <?= (chosen("grape_varieties", $gv->id, $wineGrapeVarietyIds) ? "checked" : "") ?>
                                />
                            <label for ="grape_variety-<?= $gv->id ?>"><?= $gv->variety ?></label>
                        </span>
                    <?php } ?>
                    </div>
                    <div class="error"><?= error("grape_varieties") ?></div>

                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="btn" />
                    <div class="error"><?= error("image") ?></div>
                </div>
                <div class="column-2">
                    <img src="<?= APP_URL . "/uploads/". $wine->image ?>" width="460px" />
                </div>
            </div>
            <input type="submit" class="btn bg-success" value="Update">
        </form>
                          
                        
        </form>
    </body>
</html>
<?php
if (isset($_SESSION["form-data"])) {
    unset($_SESSION["form-data"]);
}
if (isset($_SESSION["form-errors"])) {
    unset($_SESSION["form-errors"]);
}
?>
<!-- <input type="submit" class="btn bg-success" value="Update"> -->