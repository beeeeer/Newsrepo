<? include 'templates/header.html.php'; ?>

<h1>Dodaj kategorię</h1>
<form action="?task=categories&amp;action=insert" method="post">
    Nazwa kategorii: <input type="text" name="name" /><br />
    <input type="submit" value="Dodaj" />
</form>

<? include 'templates/footer.html.php'; ?>