<?php

$ch = curl_init("https://fantasy.premierleague.com/api/leagues-classic/348816/standings/?page_new_entries=1&page_standings=1&phase=1");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);
$standings = $data["standings"];
$results = $standings["results"];

// var_dump($data);
// foreach ($results as $result) {
//     echo $result['id'], " ",
//     $result['player_name'], " ",
//     $result['rank'], " ",
//     $result['total'], "</br>";
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolina Hedova </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>

<body>
    <main>
        <h1>Dolina hedova 22/23</h1>

        <table role="grid">
            <thead>
                <th>Rank</th>
                <th>Team/Menager</th>
                <th>TOT</th>
            </thead>
            <tbody>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['rank']); ?></td>
                        <td><?php echo htmlspecialchars($result['entry_name']) . "</br>";  ?>
                            <?php echo htmlspecialchars($result['player_name']);  ?>
                        </td>
                        <td><?php echo htmlspecialchars($result['total']); ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>