<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À Propos de Nous - Home4Student</title>
    <link rel="stylesheet" href="../css_files/about.css">
</head>
<body>
    <section class="hero">
        <div class="heading">
            <h1>À Propos de Nous</h1>
        </div>
        <div class="container">
            <div class="hero-container">
                <h2>Bienvenue sur notre site web</h2>
                <p>Home4student est une plateforme innovante qui simplifie la recherche de logements pour étudiants. Notre mission est de faciliter la connexion entre locataires et propriétaires.</p>
                
                <div id="moreContent" class="hidden-content">
                    <p>Nous offrons une solution complète pour :</p>
                    <ul>
                        <li>La location et la colocation étudiante</li>
                        <li>La recherche de logements adaptés à tous budgets</li>
                        <li>La mise en relation sécurisée avec les propriétaires</li>
                        <li>La gestion simplifiée des annonces</li>
                    </ul>
                    <p>Notre plateforme vous permet de trouver votre futur logement sans quitter votre domicile, avec des outils de recherche avancés et des filtres personnalisés.</p>
                    <p>L'équipe Home4student s'engage à vérifier régulièrement les annonces pour vous garantir des offres sérieuses et correspondant à vos critères.</p>
                </div>
                
                <button class="cta-button" onclick="toggleContent()">Lire la suite</button>
            </div>
            <div class="heroimage">
                <img src="../photo_files/image/c.jpeg" alt="Étudiants cherchant un logement">
            </div>
        </div>
    </section>

    <script>
        function toggleContent() {
            const content = document.getElementById('moreContent');
            const button = document.querySelector('.cta-button');
            
            content.classList.toggle('visible');
            
            if (content.classList.contains('visible')) {
                button.textContent = 'Réduire';
            } else {
                button.textContent = 'Lire la suite';
            }
        }
    </script>
</body>
</html>