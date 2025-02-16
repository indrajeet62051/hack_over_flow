# Create directory if it doesn't exist
New-Item -ItemType Directory -Force -Path "uploaded_img"

# Download product images
$urls = @{
    "uploaded_img/product7.jpg" = "https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800&h=800&fit=crop"
    "uploaded_img/product8.jpg" = "https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=800&h=800&fit=crop"
    "uploaded_img/product9.jpg" = "https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=800&h=800&fit=crop"
    "uploaded_img/product10.jpg" = "https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=800&fit=crop"
    "uploaded_img/product11.jpg" = "https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=800&h=800&fit=crop"
    "uploaded_img/product12.jpg" = "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=800&h=800&fit=crop"
    "uploaded_img/product13.jpg" = "https://images.unsplash.com/photo-1627123424574-724758594e93?w=800&h=800&fit=crop"
    "uploaded_img/product14.jpg" = "https://images.unsplash.com/photo-1606937495697-5cfb0489fc78?w=800&h=800&fit=crop"
    "uploaded_img/product15.jpg" = "https://images.unsplash.com/photo-1518640467707-6811f4a6ab73?w=800&h=800&fit=crop"
    "uploaded_img/product16.jpg" = "https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=800&h=800&fit=crop"
    "uploaded_img/product17.jpg" = "https://images.unsplash.com/photo-1594495024437-db507fd23fbe?w=800&h=800&fit=crop"
    "uploaded_img/product18.jpg" = "https://images.unsplash.com/photo-1550434280-103fc87e90be?w=800&h=800&fit=crop"
    "uploaded_img/product19.jpg" = "https://images.unsplash.com/photo-1517842645767-c639042777db?w=800&h=800&fit=crop"
    "uploaded_img/product20.jpg" = "https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=800&h=800&fit=crop"
    "uploaded_img/product21.jpg" = "https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=800&h=800&fit=crop"
    "uploaded_img/product22.jpg" = "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=800&h=800&fit=crop"
    "uploaded_img/product23.jpg" = "https://images.unsplash.com/photo-1452780212940-6f5c0d14d848?w=800&h=800&fit=crop"
    "uploaded_img/product24.jpg" = "https://images.unsplash.com/photo-1589831377283-33cb1cc6bd5d?w=800&h=800&fit=crop"
}

foreach ($url in $urls.GetEnumerator()) {
    $outFile = Join-Path $PSScriptRoot $url.Key
    Invoke-WebRequest -Uri $url.Value -OutFile $outFile
    Write-Host "Downloaded $($url.Key)"
}
