<form method="get">
    <fieldset>
        <legend>Addition</legend>
        <input name="a" type="text">
        <input name="b" type="text">
        <input type="submit" value="Addieren">
        <p><?php 
        if (!empty($_GET['a']) && !empty($_GET['b'])) {  
            $a = (int)$_GET['a'];
            $b = (int)$_GET['b'];
            echo $a . ' + ' . $b . ' = ' . ($a + $b);
        } 
        ?></p>
    </fieldset>
    <fieldset>
        <legend>Multiplikation</legend>
        <input name="c" type="text">
        <input name="d" type="text">
        <input type="submit" value="Multiplizieren">
        <p><?php 
        if (!empty($_GET['c']) && !empty($_GET['d'])) {  
            $c = (int)$_GET['c'];
            $d = (int)$_GET['d'];
            echo $c . ' * ' . $d . ' = ' . ($c * $d);
        } 
        ?></p>
    </fieldset>
</form>