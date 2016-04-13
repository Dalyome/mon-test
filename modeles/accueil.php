<?php
$sql="SELECT a.id AS idart,a.letitre,SUBSTRING(a.ladesc,1,200) AS ladesc ,a.ladate,ahr.article_id,
      ahr.rubrique_id,u.lelogin,u.lepass,u.lemail,


      GROUP_CONCAT(DISTINCT r.id) AS idrub,
      GROUP_CONCAT(DISTINCT r.lintitule SEPARATOR '|||') AS lintitulerub


        from article a
        LEFT JOIN article_has_rubrique ahr
        ON a.id = ahr.article_id
        LEFT JOIN rubrique r
        ON ahr.rubrique_id = r.id
        LEFT JOIN util u
        ON a.util_id = u.id
        GROUP BY a.id
        ORDER BY a.ladate DESC

      ";

$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_article);
