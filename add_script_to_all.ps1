$htmlFiles = Get-ChildItem -Path "." -Filter "*.html" -Recurse

foreach ($file in $htmlFiles) {
    if ($file.Name -ne "404.html") {
        $content = Get-Content -Path $file.FullName -Raw
        
        # Vérifier si le script est déjà inclus
        if ($content -notmatch 'src="js/url-handler.js"') {
            # Remplacer la ligne avec le script Lucide par la même ligne + notre script
            $newContent = $content -replace '(<script src="https://unpkg.com/lucide@latest"></script>)', '$1
    <script src="js/url-handler.js"></script>'
            
            # Écrire le contenu modifié dans le fichier
            Set-Content -Path $file.FullName -Value $newContent
            Write-Host "Script ajouté à $($file.Name)"
        } else {
            Write-Host "Script déjà présent dans $($file.Name)"
        }
    }
}

Write-Host "Terminé! Le script a été ajouté à tous les fichiers HTML."
