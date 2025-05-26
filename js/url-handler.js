// Fonction pour gérer les URLs propres
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si l'URL actuelle contient .html
    if (window.location.href.indexOf('.html') > -1) {
        // Rediriger vers l'URL sans .html
        let newUrl = window.location.href.replace('.html', '');
        window.history.replaceState(null, document.title, newUrl);
    }
    
    // Modifier tous les liens internes pour enlever .html
    document.querySelectorAll('a').forEach(function(link) {
        if (link.href && link.href.indexOf('.html') > -1 && 
            (link.href.includes(window.location.hostname) || link.href.startsWith('/'))) {
            link.href = link.href.replace('.html', '');
        }
    });
});
