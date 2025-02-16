# Create directories if they don't exist
New-Item -ItemType Directory -Force -Path "images"

# Download about page images
$urls = @{
    "images/about-img.jpg" = "https://images.unsplash.com/photo-1577563908411-5077b6dc7624?w=1200&h=800&fit=crop"
    "images/vision-img.jpg" = "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&h=800&fit=crop"
    
    "images/feature-1.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/truck-fast.svg"
    "images/feature-2.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/lock.svg"
    "images/feature-3.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/headset.svg"
    "images/feature-4.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/rotate-left.svg"
    
    "images/step-1.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/cart-shopping.svg"
    "images/step-2.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/cart-plus.svg"
    "images/step-3.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/credit-card.svg"
    "images/step-4.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/truck.svg"
    
    "images/pic-1.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/user.svg"
    "images/pic-2.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/user.svg"
    "images/pic-3.png" = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/user.svg"
}

foreach ($url in $urls.GetEnumerator()) {
    $outFile = Join-Path $PSScriptRoot $url.Key
    Invoke-WebRequest -Uri $url.Value -OutFile $outFile
    Write-Host "Downloaded $($url.Key)"
}
