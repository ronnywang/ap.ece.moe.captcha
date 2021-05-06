<?php
$obj = json_decode(file_get_contents("merge.json"));
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php foreach ($obj as $idx => $list) { ?>
<table>
    <?php for ($y = 0; $y < 24; $y ++) { ?>
    <tr>
        <?php for ($x = 0; $x < 16; $x ++) { ?>
        <?php if ($list[$y * 16 + $x]) { ?>
        <td style="background: black"></td>
        <?php } else { ?>
        <td></td>
        <?php } ?>
    <?php } ?>
    </tr>
    <?php } ?>
</table>
<input type="number" class="number-input" data-id="<?= $idx ?>">
<?php } ?>
<textarea id="output"></textarea>
<script>
var output = [];
var input = <?= json_encode($obj) ?>;
$('.number-input').change(function(e){
    output = [];
    for (var idx in input) {
        output.push([input[idx], $('.number-input').eq(idx).val()]);
    }
    $('#output').text(JSON.stringify(output));
});
</script>
