// Protection contre l'inspection du code
(function() {
    // Désactiver le clic droit
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        //alert("Le clic droit est désactivé sur ce site.");
        return false;
    });

    // Désactiver les raccourcis clavier pour les outils de développement
    document.addEventListener('keydown', function(e) {
        // Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+Shift+C, F12
        if (
            (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74 || e.keyCode === 67)) ||
            (e.keyCode === 123)
        ) {
            e.preventDefault();
            alert("Les outils de développement sont désactivés sur ce site.");
            return false;
        }
    });

    // Détection de l'ouverture des outils de développement
    let devtoolsDetector = function() {
        const widthThreshold = window.outerWidth - window.innerWidth > 160;
        const heightThreshold = window.outerHeight - window.innerHeight > 160;
        
        if (widthThreshold || heightThreshold) {
            document.body.innerHTML = '<h1 style="text-align:center;margin-top:30px;">L\'inspection des éléments est désactivée sur ce site.</h1>';
        }
    };

    // Vérifier périodiquement si les outils de développement sont ouverts
    setInterval(devtoolsDetector, 1000);
})();