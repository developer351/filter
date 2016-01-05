<?php
    $sql = true;
    $func->select($sql);
?>
    <form>
        <label>Country</label>
        <select>
        <option></option>
        </select>

        <label>Currency</label>
        <select>
            <option></option>
        </select>

        <label>Output format</label>
        <select>
            <option>Json</option>
            <option>Xml</option>
            <option>Print</option>
        </select>
        <input type="submit" name="send" value="send">
    </form>