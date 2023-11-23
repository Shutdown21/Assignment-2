<script>

function displaySelectedDataEntry() {
    var selectedDataEntryId = document.getElementById('data-entry-selector').value.split('-')[2];

    var dataEntries = document.getElementsByClassName('data-entry');
    for (var i = 0; i < dataEntries.length; i++) {
        dataEntries[i].style.display = 'none';
    }

    document.getElementById('data-entry-' + selectedDataEntryId).style.display = 'block';

    updateTextFields(selectedDataEntryId);
}

function updateTextFields(dataEntryId) {
    <?php
        $sql = "SELECT * FROM games WHERE id = '$initial_data[id]'";
        $result_set = mysqli_query($db, $sql);
        $gameData = mysqli_fetch_assoc($result_set);
    ?>

    document.getElementById('name-' + dataEntryId).value = '<?php echo $gameData['name']; ?>';
    document.getElementById('developer-' + dataEntryId).value = '<?php echo $gameData['developer']; ?>';
    document.getElementById('platform-' + dataEntryId).value = '<?php echo $gameData['platform']; ?>';
    document.getElementById('genre-' + dataEntryId).value = '<?php echo $gameData['genre']; ?>';
}

displaySelectedDataEntry();

</script>