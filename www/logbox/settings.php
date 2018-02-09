<?php
if(!empty($_POST)) {
        file_put_contents(__DIR__ . "/cfg.dat", serialize($_POST));
        header("Location: /settings.php", true, 303);
        exit;
}
$data = unserialize(file_get_contents(__DIR__ . "/cfg.dat"));
if(empty($data)) {
        $data = [];
}

?><!doctype html>
<meta charset="utf-8" />
<style>
fieldset {
        overflow: hidden;
}
fieldset>h1 {
        width: 20%;
        font-size: 1rem;
        margin: 0;
        padding: 1rem;
        padding-bottom: 0;
        float: left;
        box-sizing: border-box;
}
fieldset>label {
        width: 40%;
        float: left;
}
</style>

<form method="post" onchange="this.submit()">
        <fieldset>
                <h1>C1</h1>
                <label>
                        <span>Minutes</span>
                        <input type="num" name="c1_mins" value="<?php echo $data['c1_mins'] ?? '';?>" />
                </label>
                <label>
                        <span>Formula</span>
                        <input name="c1_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['c1_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>C2</h1>
                <label>
                        <span>Minutes</span>
                        <input type="num" name="c2_mins" value="<?php echo $data['c2_mins'] ?? '';?>" />
                </label>
                <label>
                        <span>Formula</span>
                        <input name="c2_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['c2_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>C3</h1>
                <label>
                        <span>Minutes</span>
                        <input type="num" name="c3_mins" value="<?php echo $data['c3_mins'] ?? '';?>" />
                </label>
                <label>
                        <span>Formula</span>
                        <input name="c3_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['c3_formula'] ?? '';?>" />
                </label>
        </fieldset>

        <fieldset>
                <h1>A1</h1>
                <label>
                        <span>Formula</span>
                        <input name="a1_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a1_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A2</h1>
                <label>
                        <span>Formula</span>
                        <input name="a2_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a2_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A3</h1>
                <label>
                        <span>Formula</span>
                        <input name="a3_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a3_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A4</h1>
                <label>
                        <span>Formula</span>
                        <input name="a4_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a4_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A5</h1>
                <label>
                        <span>Formula</span>
                        <input name="a5_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a5_formula'] ?? '';?>" />
                </label>
        </fieldset>
</form>
