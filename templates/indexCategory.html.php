<? include 'templates/header.html.php'; ?>

<h1>Lista kategorii</h1>
<table>
    <tr>
        <td>Nazwa</td>
        <td>&nbsp;</td>
    </tr>
    <? foreach($this->get('catsData') as $cats) { ?>
    <tr>
        <td><?= $cats['name']; ?></td>
        <td><a href="?task=categories&amp;action=delete&amp;id=<?= $cats['id']; ?>">usuń</a></td>
    </tr>
    <? } ?>
</table>

<? include 'templates/footer.html.php'; ?>