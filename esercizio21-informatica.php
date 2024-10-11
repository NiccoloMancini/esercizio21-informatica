<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nomiStudenti = array("Maria", "Giuseppe", "Luca");
        $cognomiStudenti = array("Rossi", "Bianchi", "Verdi");

        function creaStudente($nome, $cognome) {
            $studente = array("nome" => $nome, "cognome" => $cognome, "listaVoti" => array());
            for($i=0; $i<3; $i++) {
                $studente["listaVoti"][$i] = rand(2,10);
            }
            return $studente;
        }
        for($i=0; $i<3; $i++) {
            $studenti[$i] = creaStudente($nomiStudenti[$i], $cognomiStudenti[$i]);
        }

        foreach($studenti as $studente) {
            stampaStudente($studente);
        }

        function mediaStudente($studente) {
            return number_format(array_sum($studente["listaVoti"]) / count($studente["listaVoti"]), 2);
        }

        function stampaStudente($studente) {
            echo "<h2>Studente " . $studente["nome"] . " " . $studente["cognome"] . "</h2>";
            echo "<ul> <li>Nome: " . $studente["nome"] . "</li> <li>Cognome: " . $studente["cognome"] . "</li> <li>Lista Voti: <ol>";
            foreach($studente["listaVoti"] as $voto) {
                echo "<li>$voto</li>";
            }
            echo "</li> </ol> </ul>";
        }
    ?>

    <table style="border-collapse:collapse">
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Media</th>
            <th>Voto Massimo</th>
        </tr>
        <?php
            foreach($studenti as $studente) {
                echo "<tr> <td>". $studente["nome"]. "</td> <td>". $studente["cognome"]. "</td> <td>" . mediaStudente($studente) . "</td><td>". max($studente["listaVoti"]). "</td> </tr>";
            }
       ?>
    </table>
</body>
</html>