<?php
$link = mysqli_connect("localhost", "root", "root", "dev-tour_riki_20");

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT taxonomy, post_title FROM wp_term_taxonomy, wp_posts";
$str= strtoupper($_POST['str']);

if ($result = mysqli_query($link, $query)) {

    /* Récupère un tableau associatif */
    
    $Json = '{"data": [';
    while ($row = mysqli_fetch_assoc($result)) {
    //$str_titre   = substr(strtoupper($row[]))     
        //$test = $row['taxonomy'];
        //echo $test;
        echo $row['post_title'];
        
        //"category":"category1", "latitude":48.4432983398438, "longitude":-68.5397033691406, "title":"Observation du saumon de l'Atlantique", "content":"content 1", "id_icon":"1"
        
        
    }
$Json .= ']}';
    echo $Json;
    /* Libération des résultats */
    mysqli_free_result($result);
}

    
    
/* Fermeture de la connexion */
mysqli_close($link);


//A exploiter 

global $wpdb;
 global $post;
 $images = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish'";
?>
