<?php
    session_start();
    if(isset($_SESSION['pageEtud']))header('locatoin:pageEtudiant.php');;;
    if(isset($_SESSION['pageProp']))header('locatoin:pagePropiétaire.php');
    if(isset($_SESSION['pageEtud']))header('locatoin:pageAdministrateur.php'); 
    include_once 'header.php';
    include_once '../php_baseDonnée_files/connexionAuDataBase.php';
?>
  <div class="high-body">
    <div class="backgroundbody">
      <img src="../photo_files/a.jpg" alt="">
      <img src="../photo_files/b.jpg" alt="">
     
      <img src="../photo_files/V.jpg" alt="" width="100%">
      <img src="../photo_files/c.jpg" alt="" width="100%">
      <img src="../photo_files/V1.jpg" alt="" width="100%">
    </div>

    <div class="textPublicitaire">
      <h1>Location des logements :</h1>
      <h2>Trouvez votre logement à louer !</h2>
    </div>

    <div class="formulaire">
      <form action="Rechereche.php" method="post">
        <div class="ligne-formulaire">
          <select class="pos" id="ville" name="v">
            <option>Ville</option>
            <option>Agadir</option>
            <option>Ait Melloul</option>
            <option>Dakhla</option>
            <option>Guelmim</option>
            <option>Laayoune</option>
            <option>Ouarzazate</option>
            <option>Smara</option>
            <option>Taroudant</option>
          </select>

          <select class="autoApi" id="univ" name="u">
            <option>Université</option>
            <option>Faculté des Lettres et des Sciences Humaines - Agadir</option>
            <option>Faculté des Sciences - Agadir</option>
            <option>Faculté des Sciences Juridiques, Économiques et Sociales - Agadir</option>
            <option>École Nationale de Commerce et de Gestion - Agadir</option>
            <option>École Nationale des Sciences Appliquées - Agadir</option>
            <option>Faculté de Médecine et de Pharmacie - Agadir</option>
            <option>Faculté des Sciences Juridiques, Economiques et Sociales - Ait Melloul</option>
            <option>Faculté des Langues, Arts et Sciences Humaines - Ait Melloul</option>
            <option>Faculté Chariaa - Ait Melloul</option>
            <option>Faculté des Sciences Appliquées - Ait Melloul</option>
            <option>École Nationale de Commerce et de Gestion - Dakhla</option>
            <option>École Supérieure de Technologie - Dakhla</option>
            <option>Faculté d'Economie et de Gestion - Guelmim</option>
            <option>École Supérieure de Technologie - Guelmim</option>
            <option>Faculté Polydisciplinaire - Ouarzazate</option>
            <option>Faculté Polydisciplinaire - Taroudant</option>
            <option>Faculté Polydisciplinaire - Smara</option>
          </select>

          <select name="t" class="autoApi">
            <option>Type de logement</option>
            <option value="Appartement">Appartement</option>
            <option value="Maison">Maison</option>
            <option value="Immeuble">Immeuble</option>
            <option value="Chambre">Chambre</option>
            <option value="Studio">Studio</option>
            <option value="Bureau">Bureau</option>
            <option value="Villa">Villa</option>
            <option value="Logement">Autre</option>
          </select>
        </div>

        <div class="plusDeFormulaire">
          <div class="ligne-formulaire">
            <label>Budget :</label>
            <input class="pos" type="text" placeholder="Prix min DH" name="pmi">
            <input class="pos" type="text" placeholder="Prix max DH" name="pma">
          </div>

          <div class="ligne-formulaire">
            <label>Surface :</label>
            <input class="pos" type="text" placeholder="Min m²" name="smi">
            <input class="pos" type="text" placeholder="Max m²" name="sma">
          </div>

          <div class="ligne-formulaire">
            <label>Nombre de chambres :</label>
            <input class="pos" type="number" placeholder="Nombre de chambres" name="ch">
          </div>

          <div class="ligne-formulaire">
            <label>Colocation :</label>
            <label class="checkformlabel"><input type="radio" name="colocation" value="1"> Oui</label>
            <label class="checkformlabel"><input type="radio" name="colocation" value="0"> Non</label>
          </div>

        </div>

        <div class="divcherchebtn double-btns">
          <button class="cherchebtn" type="submit" name="chercheranonc">Rechercher</button>
          <button type="button" class="buttonPlusInfo" onclick="agrandirFormulaire()">Plus d'information</button>
        </div>
      </form>
    </div>
  </div>

      
      
  <div class="titre-pub-annonce">
    <h1 >Offres adaptées à vos besoins :</h1>
  </div>
   <!--3 forumalaire D'annonce -->
   <?php
// تغيير LIMIT 2 إلى LIMIT 4 لاسترجاع 4 إعلانات
$annonces = $conn->prepare("SELECT * FROM annonce ORDER BY Id_annonce DESC LIMIT 4");
$annonces->execute();

$annoncesList = $annonces->fetchAll(PDO::FETCH_ASSOC);

// التحقق من وجود إعلانات
if (count($annoncesList) < 4) {
    // هنا يمكنك إما:
    // 1. عرض ما هو متاح فقط
    // 2. إضافة إعلانات افتراضية لملء الفراغ
    $missingAds = 4 - count($annoncesList);
    for ($i = 0; $i < $missingAds; $i++) {
        $annoncesList[] = [
            'Photo1' => '../photo_files/default.jpg',
            'Prix' => '0',
            'Type' => 'Indisponible',
            'Ville' => '---',
            'N_colocation_possible' => 0,
            'N_chambre' => 0,
            'Id_annonce' => 0
        ];
    }
}
?>

<div class="AnonncePublicitaire">
  <?php foreach ($annoncesList as $index => $annonce): ?>
    <!-- Annonce <?php echo $index + 1; ?> -->
    <div class="annonce">
      <div class="slider">
        <div class="slides">
          <?php
          // عرض الصور المتاحة (Photo1 إلى Photo5)
          $hasPhotos = false;
          for ($i = 1; $i <= 5; $i++) {
              $photoField = 'Photo' . $i;
              if (!empty($annonce[$photoField])) {
                  echo '<div class="photo-annonce"><img class="slide" src="' . $annonce[$photoField] . '" alt="photo annonce" width="100%" height="200px"></div>';
                  $hasPhotos = true;
              }
          }
          
          // إذا لم توجد صور، عرض الصور الافتراضية
          if (!$hasPhotos) {
              for ($i = 1; $i <= 5; $i++) {
                  echo '<div class="photo-annonce"><img class="slide" src="../photo_files/V' . $i . '.jpg" alt="photo par défaut" width="100%" height="200px"></div>';
              }
          }
          ?>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
      </div>
      <div class="info-annonce">
        <h2><?php echo $annonce['Prix']; ?> DH</h2><br/>
        <?php echo $annonce['Type']; ?> à louer à <?php echo $annonce['Ville']; ?><br/>
        <?php 
        if ($annonce['N_colocation_possible'] > 0) {
            echo 'Colocation de ' . $annonce['N_colocation_possible'] . ' personnes<br/>';
        }
        if ($annonce['N_chambre'] > 0) {
            echo $annonce['N_chambre'] . ' chambre(s)<br/>';
        }
        ?>
        <?php if ($annonce['Id_annonce'] != 0): ?>
          <?php
                        if(isset($_SESSION['nomEtud'])|| isset($_SESSION['nomAdmin'])){
                    ?>
                        <?php if(isset($_SESSION['nomAdmin'])){?><li class="li1"><a href="../php_files/administrateur.php">Gestion admin</a></li><?php } ?>
                        <a href="voircontrat.php"><button class="demande-btn">Envoyer demande &#10095;</button></a>
                    <?php
                        }elseif(isset($_SESSION['nomProp'])){
                    ?>
                    <?php
                        }else{
                     ?>
                     <!-- PAGE DE CRIER -->
                     <button onclick="afficherPage1()" class="demande-btn">Envoyer demande &#10095;</button>
                        
                    <?php }?>
        
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<Script>
document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.querySelectorAll(".slider");

    sliders.forEach(slider => {
        const slides = slider.querySelectorAll(".slide");
        let slideIndex = 0;

        if (slides.length > 0) {
            slides[slideIndex].classList.add("dislide");
        }

        const showSlide = (index) => {
            if (index >= slides.length) slideIndex = 0;
            else if (index < 0) slideIndex = slides.length - 1;
            else slideIndex = index;

            slides.forEach(slide => slide.classList.remove("dislide"));
            slides[slideIndex].classList.add("dislide");
        };

        const prevBtn = slider.querySelector(".prev");
        const nextBtn = slider.querySelector(".next");

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener("click", () => showSlide(slideIndex - 1));
            nextBtn.addEventListener("click", () => showSlide(slideIndex + 1));
        }
    });
});</Script>

  
  <?php
    include 'footer.php';
?>