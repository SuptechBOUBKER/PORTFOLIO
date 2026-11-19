# DESIGN_SPEC — Page projet « Robot d'inspection autonome » (`projet-robotique.html`)

> Fichier de travail, **ignoré par git** (voir `.gitignore`). Il décrit la page à créer. Le contenu de la page est **réel** (projet Capstone Robotique 9, HESTIM) : ne rien inventer, n'utiliser que les faits de la section 4.

## 0. Objectif et règles absolues

Ajouter le projet au portfolio : **créer `projet-robotique.html`** et **ajouter une carte dans `index.html`**. La page doit :
- être cohérente avec les pages projet existantes (même look, mêmes composants) ;
- présenter le projet comme le post LinkedIn de l'auteur : sobre, honnête, avec les limites visibles ;
- ne contenir que des chiffres de la section 4.

Interdits : pousser sur GitHub ou committer (l'auteur le fait), demander ou écrire un token / mot de passe, modifier une autre page, `.gitignore`, `css/`, `js/`, ajouter une bibliothèque ou un framework, inventer un chiffre, un lien ou une citation, attribuer un rôle à un membre de l'équipe (pas de « ma partie »), lier le dépôt GitHub du projet (l'auteur doit d'abord confirmer qu'il est public).

## 1. Fichiers

Dossier de travail : `C:\Users\boubk\OneDrive\Documents\PORTFOLIO` (WSL : `/mnt/c/Users/boubk/OneDrive/Documents/PORTFOLIO`).

| Action | Fichier |
|---|---|
| Créer | `projet-robotique.html` (racine, à côté de `projet-DataGouvernance.html`) |
| Modifier | `index.html` : **une seule carte** ajoutée (section 7) |
| Existe | `images/Robotique/LinkedIn_Carousel_preview.pdf` (10 pages, 16:9, ~2 Mo). Attention au nom : « LinkedIn » avec un **I** majuscule |
| Existe | `images/Robotique/Project_Idea.png` (2560 × 1440, fond sombre) |
| Optionnel | `images/Robotique/demo_patrouille_9-11.mp4` (+ poster `.jpg` du même nom). N'utiliser que s'il existe |
| Optionnel | tout PDF `images/Robotique/*Report*.pdf` (rapport). N'utiliser que s'il existe |

Aucun nom de fichier avec espace. Si un fichier optionnel manque : **supprimer la section concernée** et le dire dans le compte rendu final.

## 2. Gabarit à reprendre

**Copier `projet-DataGouvernance.html`** (page la plus récente, même auteur) comme base. Ne **pas** copier le design du site « Lumora » ni changer de polices : le portfolio doit rester homogène.

À garder **tel quel** : tout le `<style>` (tokens, base, layout, composants, motion, header, menu, hero, sections, footer, visionneuse PDF), `<html lang="fr">`, la police Satoshi + Playfair Display, le module Lenis (CDN déjà utilisé), le script d'animations (`data-anim`), le menu, l'accordéon, la visionneuse PDF.

À changer : `<title>`, `<meta name="description">`, le contenu des sections, les `alt`, les ids, le mot du `.mega` du pied de page, la phrase du pied de page.

Ajouts CSS autorisés, **dans un petit bloc `<style>` en fin de `<head>` de cette page seulement** :
- `.plate{background:#0f0e0e}` (l'image du projet est sombre ; le gabarit utilise un fond bleu marine) ;
- survol des étapes (inspiré des lignes « Services » du site de référence) : `@media (hover:hover){ .steps li{transition:background .35s var(--ease-out),padding .35s var(--ease-out)} .steps li:hover{background:var(--surface-grey);padding-inline:1.5rem} }` ;
- rien d'autre. Respecter `prefers-reduced-motion`.

## 3. Structure de la page, section par section

Garder les classes existantes (`hero`, `constat`, `sec-title`, `eyebrow`, `accent`, `cta`, `ledger`, `plate`, `cards3`, `cards4`, `card`, `steps`, `contrib`, `tools`, `acc`, `note`, `school`). Texte **verbatim** (français).

### Header et menu
- `.hdr-left` : « Projet académique » / « HESTIM · Robotique 9 (Capstone) » / lien `← Portfolio` (`index.html#projects`).
- Nav : Projet (`#projet`), Démarche (`#demarche`), Résultats (`#resultats`).
- Menu plein écran : Projet, Démarche, Résultats, Livrables (`#livrables`), ← Portfolio.

### 3.1 Hero (`#top`)
- eyebrow : « Robotique · Inspection autonome »
- h1 (`data-anim="lines"`) : « Patrouiller, détecter, <span class="accent">rapporter</span>. »
- lead : « Un robot d'inspection autonome, entièrement en simulation : il patrouille dans un bâtiment, repère les fissures et les taches sur les murs, les place sur la carte et écrit son rapport PDF tout seul. »
- CTA : solide « Voir la présentation → » = `images/Robotique/LinkedIn_Carousel_preview.pdf`, `target="_blank" rel="noopener" data-viewer data-title="Présentation" data-original="images/Robotique/LinkedIn_Carousel_preview.pdf"` ; fantôme « Voir le schéma → » = `images/Robotique/Project_Idea.png`, `target="_blank" rel="noopener"`.
- `dl.ledger` : École → HESTIM · Cadre → Capstone Robotique 9 · Environnement → Simulation (ROS 2, Gazebo).
- plate : `Project_Idea.png`, `width="2560" height="1440" fetchpriority="high"`, alt : « Schéma du projet : un robot patrouille un bâtiment simulé, détecte fissures et taches, les localise sur la carte SLAM et génère un rapport PDF. Mesures en simulation : mAP@0.5 de 0,995, erreur médiane de 11,8 cm, 4 patrouilles complètes sur 8. »

### 3.2 Le problème (`#projet`, `.constat`)
- eyebrow « Le problème »
- `.big` : « Inspecter des murs à la main est lent, coûteux et subjectif : deux inspecteurs ne voient pas toujours les mêmes défauts. »
- `.signature` : « — Question centrale : un robot peut-il patrouiller seul, repérer les défauts, les placer sur une carte et écrire le rapport ? »

### 3.3 Le système (`.rule`, 6 cartes dans `.cards3`)
Titre : « Six étapes, de la patrouille au <span class="accent">rapport</span>. » (eyebrow « Le système »). Pas d'image dans cette section (déjà dans le hero).
1. **Monde simulé** : « Un bâtiment à trois zones sous Gazebo, avec 8 défauts connus : 4 fissures et 4 taches. »
2. **Patrouille** : « Nav2 conduit le robot TurtleBot3 à travers 11 points. »
3. **Caméra** : « Images 640 × 480 à 2 Hz, sans caméra de profondeur. »
4. **Détection** : « YOLOv8n repère fissures et taches, seuil de confiance 0,4. »
5. **Localisation** : « Un rayon lancé sur la carte SLAM donne la position du défaut. »
6. **Rapport** : « Un PDF est écrit automatiquement à la fin de la patrouille. »

### 3.4 La démarche (`#demarche`, `.steps`, colonne sticky à gauche)
Titre : « Du mur simulé au <span class="accent">rapport</span> final. » (eyebrow « La démarche »). 6 étapes `li[data-anim=fadeUp]` avec `span.idx` 01–06 :
1. **Un monde simulé** : « Positions des défauts stockées comme vérité terrain. Sol et éclairage réglés avant tout : le robot glissait et l'image était blanche. »
2. **Un jeu de données** : « 466 images prises en téléportant le robot, dont 19 % sans défaut. Découpage par position, pas par image, et un jeu test_unseen avec 8 défauts nouveaux. »
3. **Le détecteur** : « YOLOv8n entraîné sur Google Colab, 60 époques. YOLOv8s donne la même précision mais 2,4 fois plus lent : YOLOv8n est gardé. »
4. **La navigation** : « Carte construite avec SLAM Toolbox, puis patrouille Nav2. Un point raté est retenté une fois, puis signalé. »
5. **La localisation** : « La direction du défaut dans l'image devient un rayon sur la carte. Le premier mur touché donne la position. »
6. **Gravité, suivi, rapport** : « La hauteur du défaut est estimée pour donner un niveau de gravité. Deux patrouilles sont comparées : nouveau, disparu, aggravé. Le rapport PDF est généré. »

### 3.5 Résultats (`#resultats`, `.res`)
Titre : « Des mesures, <span class="accent">en simulation</span>. » (eyebrow « Résultats »). Deux `dl.ledger` (valeur dans `dd`, légende dans `p.sub`), valeurs affichées **en dur dans le HTML** (le compteur de 3.5bis est un confort) :
- Ledger 1 : **0,995** « mAP@0.5 sur le jeu de test » · **11,8 cm** « erreur médiane de position » · **4 / 8** « patrouilles complètes ».
- Ledger 2 : **0,988** « mAP@0.5 sur des défauts jamais vus » · **6,3 cm** « écart entre patrouilles » · **7,3 %** « erreur médiane sur la hauteur estimée ».
- `.note` : « Tous les scores sont mesurés en simulation : ils ne disent rien sur de vrais murs. »

**3.5bis Compteur au défilement** (idée reprise du site de référence) : sur chaque `dd` chiffré, attribut `data-count="<valeur>" data-dec="<décimales>"` ; JS simple (pas de bibliothèque) : le nombre monte de 0 à la valeur quand la section entre dans la vue (IntersectionObserver, 1,2 s, easeOutCubic), format français (virgule), suffixe conservé (` cm`, ` %`). Pour « 4 / 8 » ne compter que le 4. Si `prefers-reduced-motion` ou JS absent : valeurs finales affichées, sans animation. À la fin de l'animation la valeur affichée doit être **identique** à celle du HTML.

### 3.6 Ce qui ne marche pas encore (`.bg-grey`, `.cards4`)
Titre : « Ce qui ne marche pas <span class="accent">encore</span>. » (eyebrow « Limites »)
1. **Navigation** : « Nav2 termine 4 patrouilles sur 8. La cause du « plan vide » du planificateur n'est pas établie. »
2. **Éclairage fort** : « Aucune patrouille complète sur 4 en lumière forte. Le détecteur seul reste proche de 1. »
3. **Localisation** : « Une fois, AMCL s'est trompé d'environ 3 m, ce qui a donné 12 faux positifs. »
4. **Simulation seulement** : « Aucun test sur de vrais murs. »
`p.after` : « Nous les documentons parce qu'un détecteur performant ne suffit pas : le robot doit aussi arriver jusqu'au mur. »

### 3.7 Ce que nous retenons (`.contrib.bg-dark`, structure de « Ma contribution »)
- eyebrow « Ce que nous retenons » ; h2 « Un détecteur performant ne suffit pas. »
- `.txt` : « Le plus difficile n'était pas le modèle, mais de l'intégrer dans un système qui navigue, localise correctement et transforme les observations en informations exploitables. »
- CTA solide (variante sombre) « Voir la présentation → » (même visionneuse que 3.1).
- `.contrib-list` (4 `li`) : « Documenter les échecs autant que les réussites » · « Mesurer sur des images jamais vues (test_unseen) » · « Compter les essais de démonstration à part de l'évaluation » · « Tout est évalué en simulation, pas encore en environnement réel »

### 3.8 Outils (`.bg-grey`, `ul.tools`, numérotés 01…)
ROS 2 Humble · Gazebo · TurtleBot3 · Nav2 · SLAM Toolbox · AMCL · TF2 · RViz2 · YOLOv8 (Ultralytics) · Google Colab · Python · WSL2 · Git/GitHub. Titre « La boîte à outils. »

### 3.9 Démonstration (**conditionnelle**, `#demo`, `.rule`)
Seulement si `images/Robotique/demo_patrouille_9-11.mp4` existe : `<video controls playsinline preload="metadata" poster="images/Robotique/demo_patrouille_9-11.jpg">` dans un `.plate` (si le poster n'existe pas, omettre l'attribut). Titre « Une patrouille, <span class="accent">filmée</span>. » ; légende : « Essai de démonstration : 9 points atteints sur 11, 8 défauts sur 8 trouvés, erreur médiane de 10,8 cm. Compté à part des tableaux d'évaluation. » Sinon : supprimer la section et l'entrée de menu éventuelle.

### 3.10 Livrables (`#livrables`, accordéon `.acc`)
Titre « Tout le projet, en fichiers. » (eyebrow « Livrables »).
1. « Présentation (PDF) » : « Dix pages : problème, système, données, détecteur, localisation, navigation, résultats et limites. » Bouton fantôme **avec visionneuse** (`data-viewer`, `data-original` = le même PDF) + `download`.
2. « Schéma du projet (PNG) » : « Vue d'ensemble de la chaîne et des quatre mesures clés. » Lien `target="_blank"`.
3. (**conditionnel**) « Rapport technique (PDF) » : seulement si un PDF `*Report*` existe : « Contexte, méthode, expériences, résultats et limites. » Visionneuse comme le n°1.
Supprimer le `.acc-note` du gabarit (il parlait de .pptx/.docx).

### 3.11 Équipe (`.rule`)
Titre « Un travail à cinq. » (eyebrow « Équipe »). `dl.ledger.team` : **Réalisé par** → CHEYOUKH Boubker · FETTAH Saad · ELATMANI Abderrazzak · SALEK Mehdi · KHOUMANIA Hamza ; **Encadré par** → Dr Sridath Tula. `p.school` : « HESTIM ». Ajouter une `p.note` : « Des assistants IA ont été utilisés pendant le développement. Chaque résultat présenté a été testé et mesuré. »

### 3.12 Pied de page
`.f-phrase` : « Patrouiller, détecter, rapporter. » · `.mega` : « ROBOT » · navigation : Accueil, Projet, Démarche, Résultats · contact : e-mail, LinkedIn, GitHub (**les liens du gabarit, inchangés** ; GitHub = le profil, pas le dépôt du projet) · © 2026 CHEYOUKH Boubker.

## 4. Faits autorisés (liste fermée)

Aucun autre chiffre dans la page.

| Fait | Valeur |
|---|---|
| Défauts du monde | 8 (4 fissures, 4 taches) ; 3 zones |
| Patrouille | 11 points (8 vues + 3 passages) ; retente 1 fois ; arrêt global 12 min |
| Caméra | 640 × 480, 2 Hz, pas de profondeur |
| Carte SLAM | 156 × 118 cellules de 5 cm |
| Jeu de données | 466 images ; 19 % sans défaut ; train 246, val 54, test 102, test_unseen 64 |
| Détecteur | YOLOv8n, 60 époques, Colab, seuil 0,4 ; mAP@0.5 = 0,995 (val et test), 0,988 (test_unseen) |
| YOLOv8s | même mAP@0.5 (0,994 sur test_unseen), 2,4 × plus lent (76 vs 180 ms), fichier 3,6 × plus gros |
| Localisation | médiane 11,8 cm ; max 31 cm ; 8 patrouilles ; répétabilité 6,3 cm |
| Gravité | erreur médiane de hauteur 7,3 % (max 17,1 %) ; 73/73 cohérentes |
| Suivi entre patrouilles | nouveau 12/12 ; disparu 12/12 ; aggravé 9/12 ; 32 fausses alarmes |
| Navigation | 4 patrouilles complètes sur 8 ; 61 points sur 88 ; CycloneDDS 18/55 (pire) |
| Éclairage | patrouilles complètes 2/2 (faible), 4/8 (normal), 0/4 (fort) |
| AMCL | erreur d'environ 3 m une fois, 12 faux positifs |
| Démo (si vidéo) | 9/11 points, 8/8 défauts, médiane 10,8 cm ; hors évaluation |

Formulations à **éviter** : « temps réel », « validé en conditions réelles », « précis à 99 % », tout superlatif. Garder « en simulation » à côté de chaque mesure.

## 5. Accessibilité, performance, SEO
- `alt` descriptifs ; une seule `h1` ; ordre des titres cohérent ; `lang="fr"`.
- Hero : `fetchpriority="high"` ; images suivantes `loading="lazy"` avec `width`/`height`.
- Visionneuse PDF : le gabarit ouvre le PDF dans un nouvel onglet sur téléphone (comportement existant, à garder).
- `<title>` : « Robot d'inspection autonome · Robotique — Boubker Cheyoukh ». `<meta description>` : « Capstone Robotique à HESTIM : un robot simulé patrouille, détecte fissures et taches, les localise sur la carte et génère un rapport PDF. mAP@0.5 de 0,995, erreur médiane de 11,8 cm, 4 patrouilles complètes sur 8. » Pas de balises Open Graph (le gabarit n'en a pas ; domaine inconnu).
- Contraste conforme (le gabarit l'est déjà : ne pas changer les couleurs).

## 6. Mouvement
Réutiliser tel quel : `data-anim` (`lines`, `words`, `fadeUp`, `fade`, `plate`), Lenis, parallax du `.plate` s'il existe dans le gabarit. Ajouts autorisés : seulement 3.5bis et le survol des étapes. Tout est désactivé avec `prefers-reduced-motion`.

## 7. Carte dans `index.html`
- Une seule occurrence de `projet-DataGouvernance.html` existe dans `index.html` (carte « MDM Hôtellerie »). **Insérer la nouvelle carte juste avant** (projets récents d'abord), en copiant son balisage et ses classes **exactement**.
- `data-category="ia"` (les filtres sont : all, dev, ia, reseaux ; il n'y a pas de filtre robotique).
- Badge (haut droite, même classes que MDM, couleur `bg-emerald-600`) : « Robotique & Vision ».
- Image : `images/Robotique/Project_Idea.png`, `loading="lazy"`, même classes que l'image MDM, alt : « Robot d'inspection autonome : patrouille, détection, localisation sur la carte et rapport PDF ».
- `h3` : « Robot d'inspection autonome — Capstone Robotique » ; `p` : « Un robot simulé qui patrouille, détecte les fissures et les taches sur les murs, les localise sur la carte et génère un rapport PDF. »
- Lien « En savoir plus » → `projet-robotique.html` (même balisage que les autres).
- Chercher un éventuel compteur de projets écrit en dur (ex. « 15 projets ») : **ne pas le deviner**, seulement le signaler dans le compte rendu.

## 8. Vérifications avant de finir
1. Serveur statique local (`python3 -m http.server`), puis Playwright : captures pleine page de `projet-robotique.html` à **1440 × 900** et **390 × 844** (faire défiler pour déclencher les animations), et de `index.html#projects`. Enregistrer les captures hors du dépôt (dossier temporaire).
2. Console : zéro erreur, zéro 404 (images, PDF). Pas de défilement horizontal à 390 px.
3. Visionneuse : cliquer « Voir la présentation » → le PDF s'affiche, Échap ferme. Fonctionne aussi avec `prefers-reduced-motion` émulé.
4. Extraire tous les nombres du texte visible de la page et **vérifier qu'ils sont tous dans la section 4** ; lister tout écart.
5. `git status` : seuls `projet-robotique.html` et `index.html` sont modifiés/créés (les fichiers `images/Robotique/` sont à ajouter par l'auteur). **Ne pas committer ni pousser.**
6. Compte rendu final : 5 lignes (fichiers créés/modifiés, sections conditionnelles gardées ou supprimées, écarts éventuels, rien de poussé).
