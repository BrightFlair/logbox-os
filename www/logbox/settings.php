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
	position: relative;
}
fieldset>h1 {
	position: absolute;
	top: 0;
	left: 0;
	margin: 0;

}
fieldset>label {
	display: block;
	padding-left: 4rem;
}
fieldset>label span {
	display: block;
	width: 4rem;
	padding-right: 1rem;
}
button {
	display: block;
	padding: 1rem;
	margin: 0 auto;
}
</style>

<form method="post">
	<fieldset>
		<h1>LB</h1>
		<label>
			<span>Friendly Logbox name</span>
			<input name="lb_name" value="<?php echo $data['lb_name'] ?? '';?>" />
		</label>
	</fieldset>
        <fieldset>
                <h1>C1</h1>
		<label class="large">
			<span>Name</span>
			<input name="c1_name" value="<?php echo $data['c1_name'] ?? '';?>" />
		</label>
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
		<label class="large">
			<span>Name</span>
			<input name="c2_name" value="<?php echo $data['c2_name'] ?? '';?>" />
		</label>
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
		<label class="large">
			<span>Name</span>
			<input name="c3_name" value="<?php echo $data['c3_name'] ?? '';?>" />
		</label>
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
		<label class="large">
			<span>Name</span>
			<input name="a1_name" value="<?php echo $data['a1_name'] ?? '';?>" />
		</label>
                <label>
                        <span>Formula</span>
                        <input name="a1_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a1_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A2</h1>
		<label class="large">
			<span>Name</span>
			<input name="a2_name" value="<?php echo $data['a2_name'] ?? '';?>" />
		</label>
                <label>
                        <span>Formula</span>
                        <input name="a2_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a2_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A3</h1>
		<label class="large">
			<span>Name</span>
			<input name="a3_name" value="<?php echo $data['a3_name'] ?? '';?>" />
		</label>
                <label>
                        <span>Formula</span>
                        <input name="a3_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a3_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A4</h1>
		<label class="large">
			<span>Name</span>
			<input name="a4_name" value="<?php echo $data['a4_name'] ?? '';?>" />
		</label>
                <label>
                        <span>Formula</span>
                        <input name="a4_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a4_formula'] ?? '';?>" />
                </label>
        </fieldset>
        <fieldset>
                <h1>A5</h1>
		<label class="large">
			<span>Name</span>
			<input name="a5_name" value="<?php echo $data['a5_name'] ?? '';?>" />
		</label>
                <label>
                        <span>Formula</span>
                        <input name="a5_formula" placeholder="e.g. (x + 220) / 2" value="<?php echo $data['a5_formula'] ?? '';?>" />
                </label>
        </fieldset>

	<button name="do" value="save">Save</button>
</form>
