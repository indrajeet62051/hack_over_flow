# Create directories if they don't exist
New-Item -ItemType Directory -Force -Path "uploaded_img"

# Product images
$urls = @{
    "uploaded_img/electronics1.jpg" = "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800"
    "uploaded_img/electronics2.jpg" = "https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=800"
    "uploaded_img/electronics3.jpg" = "https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800"
    "uploaded_img/fashion1.jpg" = "https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800"
    "uploaded_img/fashion2.jpg" = "https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=800"
    "uploaded_img/fashion3.jpg" = "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800"
    "uploaded_img/home1.jpg" = "https://images.unsplash.com/photo-1558089687-f282ffcbc0d1?w=800"
    "uploaded_img/home2.jpg" = "https://images.unsplash.com/photo-1517142089942-ba376ce32a2e?w=800"
    "uploaded_img/home3.jpg" = "https://images.unsplash.com/photo-1518640467707-6811f4a6ab73?w=800"
    "uploaded_img/book1.jpg" = "https://images.unsplash.com/photo-1532012197267-da84d127e765?w=800"
    "uploaded_img/book2.jpg" = "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=800"
    "uploaded_img/book3.jpg" = "https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=800"
}

foreach ($url in $urls.GetEnumerator()) {
    $outFile = Join-Path $PSScriptRoot $url.Key
    Write-Host "Downloading $($url.Key)..."
    Invoke-WebRequest -Uri $url.Value -OutFile $outFile
    Write-Host "Downloaded $($url.Key)"
}
