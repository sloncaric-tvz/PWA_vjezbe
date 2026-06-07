<?php
include('header.php');
?>

<div class="form-container">
    <form action="skripta.php" method="POST">
        <div class="form-item">
            <label for="naslov">Naslov:</label>
            <div class="form-field">
                <input type="text" name="naslov" id="naslov" class="form-field-textual">
            </div>
        </div>
        <div class="form-item">
            <label for="sazetak">Kratki sadržaj (50 znakova)</label>
            <div class="form-field">
                <textarea name="sazetak" id="sazetak" cols="30" rows="2" maxlength="50" class="form-field-textual"></textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="sadrzaj">Sadržaj:</label>
            <div class="form-field">
                <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-field-textual"></textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="slika">Slika: </label>
            <div class="form-field">
                <input type="file" accept="image/jpg,image/gif,image/png" class="input-text" name="slika" id="slika" />
            </div>
        </div>
        <div class="form-item">
            <label for="kategorija">Kategorija vijesti</label>
            <div class="form-field">
                <select name="kategorija" id="kategorija" class="form-field-textual">
                    <option value="sport">Sport</option>
                    <option value="kultura">Kultura</option>
                </select>
            </div>
        </div>
        <div class="form-item">
            <label>Spremiti u arhivu:
                <div class="form-field">
                    <input type="checkbox" name="archive">
                </div>
            </label>
        </div>
        <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" value="Prihvati">Prihvati</button>
        </div>

    </form>
</div>

<?php
include('footer.php');
?>