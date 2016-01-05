<?php

   $country = $formData->getCountries();
   $currency = $formData->getCurrensies();

?>
    <form>
        <label>Country</label>
        <select>
            <?php
                foreach($country as $countryItem)
                {
                    echo "<option>".$countryItem['name']."</option>";
                }
            ?>
        </select>

        <label>Currency</label>
        <select>
            <?php
            foreach($currency as $currencyItem)
            {
                echo "<option>".$currencyItem['name']."</option>";
            }
            ?>
        </select>

        <label>Output format</label>
        <select>
            <option>Json</option>
            <option>Xml</option>
            <option>Print</option>
        </select>
        <input type="submit" name="send" value="send">
    </form>