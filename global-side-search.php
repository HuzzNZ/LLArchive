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
                    <optgroup label="Main Units">
                        <option>μ's</option>
                        <option>Aqours</option>
                        <option>Nijigasaki High School Idol Club</option>
                    </optgroup>
                    <optgroup label="Side Units">
                        <option>A-RISE</option>
                        <option>Saint Aqours Snow</option>
                    </optgroup>
                    <optgroup label="Subunits">
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
                        <option>Honoka Kousaka</option>
                        <option>Kotori Minami</option>
                        <option>Umi Sonoda</option>
                        <option>Hanayo Koizumi</option>
                        <option>Rin Hoshizora</option>
                        <option>Maki Nishikino</option>
                        <option>Nico Yazawa</option>
                        <option>Eli Ayase</option>
                        <option>Nozomi Toujou</option>
                    </optgroup>
                    <optgroup label="Aqours">
                        <option>Chika Takami</option>
                        <option>You Watanabe</option>
                        <option>Riko Sakurauchi</option>
                        <option>Hanamaru Kunikida</option>
                        <option>Yoshiko Tsushima</option>
                        <option>Ruby Kurosawa</option>
                        <option>Mari Ohara</option>
                        <option>Dia Kurosawa</option>
                        <option>Kanan Matsuura</option>
                    </optgroup>
                    <optgroup label="Nijigasaki High School Idol Club">
                        <option>Ayumu Uehara</option>
                        <option>Setsuna Yuki</option>
                        <option>Ai Miyashita</option>
                        <option>Shizuku Osaka</option>
                        <option>Rina Tennoji</option>
                        <option>Kasumi Nakasu</option>
                        <option>Karin Asaka</option>
                        <option>Emma Verde</option>
                        <option>Kanata Konoe</option>
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
