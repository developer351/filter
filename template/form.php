<?php

   $country = $services->getCountries();
   $currency = $services->getCurrensies();

?>
    <form method="post">
        <label>Country</label>
        <select name="country">
            <?php
                foreach($country as $countryItem)
                {
                    echo "<option>".$countryItem['name']."</option>";
                }
            ?>
        </select>

        <label>Currency</label>
        <select name="currency">
            <?php
            foreach($currency as $currencyItem)
            {
                echo "<option>".$currencyItem['name']."</option>";
            }
            ?>
        </select>

        <label>Output format</label>
        <select name="format">
            <option>Json</option>
            <option>Xml</option>
            <option>Print</option>
        </select>
        <input type="text" name="quantity">
        <input type="submit" name="send" value="send">
    </form>
    <hr>
<?php
    if(isset($_POST['send'])){
       $getForm->getFormData();
    }

?>
<hr>

