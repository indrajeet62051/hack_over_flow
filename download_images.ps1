# Create directories if they don't exist
New-Item -ItemType Directory -Force -Path "images"
New-Item -ItemType Directory -Force -Path "uploaded_img"

# Download category banners
$urls = @{
    "images/electronics-banner.jpg" = "https://images.unsplash.com/photo-1498049794561-7780e7231661?w=1600&h=900&fit=crop"
    "images/fashion-banner.jpg" = "https://images.unsplash.com/photo-1445205170230-053b83016050?w=1600&h=900&fit=crop"
    "images/home-banner.jpg" = "https://images.unsplash.com/photo-1484154218962-a197022b5858?w=1600&h=900&fit=crop"
    
    "images/cat-electronics.png" = "https://images.unsplash.com/photo-1526738549149-8e07eca6c147?w=800&h=800&fit=crop"
    "images/cat-fashion.png" = "https://images.unsplash.com/photo-1479064555552-3ef4979f8908?w=800&h=800&fit=crop"
    "images/cat-home.png" = "https://images.unsplash.com/photo-1538688525198-9b88f6f53126?w=800&h=800&fit=crop"
    "images/cat-books.png" = "https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=800&h=800&fit=crop"
    
    "uploaded_img/product1.jpg" = "https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=800&h=800&fit=crop"
    "uploaded_img/product2.jpg" = "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800&h=800&fit=crop"
    "uploaded_img/product3.jpg" = "https://images.unsplash.com/photo-1585386959984-a4155224a1ad?w=800&h=800&fit=crop"
    "uploaded_img/product4.jpg" = "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=800&fit=crop"
    "uploaded_img/product5.jpg" = "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=800&h=800&fit=crop"
    "uploaded_img/product6.jpg" = "https://images.unsplash.com/photo-1549298916-b41d501d3772?w=800&h=800&fit=crop"
}

foreach ($url in $urls.GetEnumerator()) {
    $outFile = Join-Path $PSScriptRoot $url.Key
    Invoke-WebRequest -Uri $url.Value -OutFile $outFile
    Write-Host "Downloaded $($url.Key)"
}
