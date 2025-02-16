# Create directories if they don't exist
New-Item -ItemType Directory -Force -Path "images"

# Download about page images
$urls = @{
    "images/about-img.jpg" = "https://images.unsplash.com/photo-1577563908411-5077b6dc7624?w=1200&h=800&fit=crop"
    "images/vision-img.jpg" = "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&h=800&fit=crop"
    
    "images/feature-1.png" = "https://img.icons8.com/color/200/000000/delivery.png"
    "images/feature-2.png" = "https://img.icons8.com/color/200/000000/secure-payment.png"
    "images/feature-3.png" = "https://img.icons8.com/color/200/000000/online-support.png"
    "images/feature-4.png" = "https://img.icons8.com/color/200/000000/return-purchase.png"
    
    "images/step-1.png" = "https://img.icons8.com/color/200/000000/shopping-cart-loaded.png"
    "images/step-2.png" = "https://img.icons8.com/color/200/000000/add-shopping-cart.png"
    "images/step-3.png" = "https://img.icons8.com/color/200/000000/card-security.png"
    "images/step-4.png" = "https://img.icons8.com/color/200/000000/in-transit.png"
    
    "images/pic-1.png" = "https://img.icons8.com/color/200/000000/user-female.png"
    "images/pic-2.png" = "https://img.icons8.com/color/200/000000/user-male.png"
    "images/pic-3.png" = "https://img.icons8.com/color/200/000000/user-female-circle.png"
}

foreach ($url in $urls.GetEnumerator()) {
    $outFile = Join-Path $PSScriptRoot $url.Key
    Invoke-WebRequest -Uri $url.Value -OutFile $outFile
    Write-Host "Downloaded $($url.Key)"
}
