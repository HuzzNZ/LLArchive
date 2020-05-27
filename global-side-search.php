<div class="search-wrapper">
    <div class="top-strip" id="search-top-strip"></div>
    <div class="search" id="<?php if (LANG == "ja"){ echo "ja-l"; } ?>">
        <h1><?= _KS_TITLE ?></h1>
        <hr>
        <form action="/love-live/search" method="GET">
            <h3 class="form-label"><?= _KS_ALBUM_TITLE ?></h3>
            <label>
                <input type="text" name="title" value="<?php if ($title != "%") { echo str_replace("%", "", $title); } ?>">
            </label>
            <hr class="form-body-hr">
            <h3 class="form-label"><?= _KS_ARTIST ?></h3>
            <label>
                <select name="artist">
                    <option selected></option>
                    <optgroup label="<?= _UNIT_MAIN ?>">
                        <option>μ's</option>
                        <option>Aqours</option>
                        <option><?= _NHS_IDOL_CLUB ?></option>
                    </optgroup>
                    <optgroup label="<?= _UNIT_RIVAL ?>">
                        <option>A-RISE</option>
                        <option>Saint Aqours Snow</option>
                    </optgroup>
                    <optgroup label="<?= _UNIT_SUB ?>">
                        <option>Printemps</option>
                        <option>lily white</option>
                        <option>BiBi</option>
                        <option>CYaRon!</option>
                        <option>AZALEA</option>
                        <option>Guilty Kiss</option>
                        <option>A·ZU·NA</option>
                        <option>QU4RTZ</option>
                        <option>DiverDiva</option>
                    </optgroup>
                </select>
            </label>
            <h3 class="form-label"><?= _KS_SDT ?></h3>
            <label>
                <select name="solo">
                    <option selected></option>
                    <optgroup label="μ's">
                        <option value="Honoka Kousaka"><?= _HONOKA ?></option>
                        <option value="Eli Ayase"><?= _ELI ?></option>
                        <option value="Kotori Minami"><?= _KOTORI ?></option>
                        <option value="Umi Sonoda"><?= _UMI ?></option>
                        <option value="Rin Hoshizora"><?= _RIN ?></option>
                        <option value="Maki Nishikino"><?= _MAKI ?></option>
                        <option value="Nozomi Toujou"><?= _NOZOMI ?></option>
                        <option value="Hanayo Koizumi"><?= _HANAYO ?></option>
                        <option value="Nico Yazawa"><?= _NICO ?></option>
                    </optgroup>
                    <optgroup label="Aqours">
                        <option value="Chika Takami"><?= _CHIKA ?></option>
	                    <option value="Riko Sakurauchi"><?= _RIKO ?></option>
	                    <option value="Kanan Matsuura"><?= _KANAN ?></option>
	                    <option value="Dia Kurosawa"><?= _DIA ?></option>
                        <option value="You Watanabe"><?= _YOU ?></option>
	                    <option value="Yoshiko Tsushima"><?= _YOSHIKO ?></option>
                        <option value="Hanamaru Kunikida"><?= _HANAMARU ?></option>
                        <option value="Mari Ohara"><?= _MARI ?></option>
	                    <option value="Ruby Kurosawa"><?= _RUBY ?></option>
                    </optgroup>
                    <optgroup label="<?= _NHS_IDOL_CLUB ?>">
                        <option value="Ayumu Uehara"><?= _AYUMU ?></option>
	                    <option value="Kasumi Nakasu"><?= _KASUMI ?></option>
	                    <option value="Shizuku Osaka"><?= _SHIZUKU ?></option>
	                    <option value="Karin Asaka"><?= _KARIN ?></option>
	                    <option value="Ai Miyashita"><?= _AI ?></option>
	                    <option value="Kanata Konoe"><?= _KANATA ?></option>
                        <option value="Setsuna Yuki"><?= _SETSUNA ?></option>
	                    <option value="Emma Verde"><?= _EMMA ?></option>
                        <option value="Rina Tennoji"><?= _RINA ?></option>
                    </optgroup>
                </select>
            </label>
            <hr class="form-body-hr">
            <h3 class="form-label"><?= _KS_RELEASED_AFTER ?></h3>
            <label class="date-label">
                <input class="date-input" type="date" name="rl_after" value="<?php if ($rl_after != "1970-01-01") { echo $rl_after; } ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
            </label>
            <h3 class="form-label"><?= _KS_RELEASED_BEFORE ?></h3>
            <label class="date-label">
                <input class="date-input" type="date" name="rl_before" value="<?php if ($rl_before != "2069-12-31") { echo $rl_before; } ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
            </label>
            <label class="submit">
                <input type="submit" value="<?= _SEARCH_GO ?>">
            </label>
        </form>
    </div>
</div>

<div class="search-wrapper">
    <div class="top-strip" id="search-top-strip"></div>
    <div class="search" id="<?php if (LANG == "ja"){ echo "ja-l"; } ?>">
        <h1><?= _CS_TITLE ?></h1>
        <hr>
        <form action="/love-live/search" method="GET">
            <h3 class="form-label"><?= _CS_CATALOG ?></h3>
            <label>
                <input name="catalog" value="<?php echo $catalog ?>" type="text" required>
            </label>
            <label class="submit">
                <input type="submit" value="<?= _SEARCH_GO ?>">
            </label>
        </form>
    </div>
</div>
