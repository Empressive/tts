<?php
#Страница закрытия заявки
$item_id = intval($_GET['id']);

echo "<table class='close_table' border='1'>";
echo "<form id='close' method='post' action='/scripts/close.php?id={$item_id}'>";
echo "<tr><th colspan='2' bgcolor='#ff8c00'>Информация о заявке №$item_id</th></tr>";
echo "<tr><td align='center'>Статус:</td><td align='center'><select name='status'><option value='2'>Выполнена</option></select></td></tr>";
echo "<tr><td align='center'>Причина:</td><td align='center'><select name='reason'>";

$query = mysql_query("SELECT * FROM reason WHERE reason_id != '0'");

while($result = mysql_fetch_assoc($query))
{
    echo "<option value='{$result['reason_id']}'>{$result['reason']}</option>";
}

echo "</select></td></tr>";
echo "<tr><td><input form='none' onclick=\"location.href='/detail/{$item_id}/'\" type='submit' value='Отменить'></td><td><input form='close' type='submit' value='Сохранить'></td></tr>";
echo "</form>";
echo "</table>";
