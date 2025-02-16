# Create directories if they don't exist
New-Item -ItemType Directory -Force -Path "images"
New-Item -ItemType Directory -Force -Path "uploaded_img"

# About page images
$aboutImages = @{
    "images/about-img.jpg" = "https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800"
    "images/vision-img.jpg" = "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800"
    "images/feature-1.png" = "https://img.icons8.com/color/96/000000/delivery.png"
    "images/feature-2.png" = "https://img.icons8.com/color/96/000000/secure-payment.png"
    "images/feature-3.png" = "https://img.icons8.com/color/96/000000/online-support.png"
    "images/feature-4.png" = "https://img.icons8.com/color/96/000000/return.png"
    "images/step-1.png" = "https://img.icons8.com/color/96/000000/shopping-cart.png"
    "images/step-2.png" = "https://img.icons8.com/color/96/000000/add-shopping-cart.png"
    "images/step-3.png" = "https://img.icons8.com/color/96/000000/checked-checkbox.png"
    "images/step-4.png" = "https://img.icons8.com/color/96/000000/truck.png"
    "images/pic-1.png" = "https://img.icons8.com/color/96/000000/user-female.png"
    "images/pic-2.png" = "https://img.icons8.com/color/96/000000/user-male.png"
    "images/pic-3.png" = "https://img.icons8.com/color/96/000000/user-female-circle.png"
}

# Product images
$productImages = @{
    "uploaded_img/electronics1.jpg" = "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800"
    "uploaded_img/electronics2.jpg" = "https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=800"
    "uploaded_img/electronics3.jpg" = "https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800"
    "uploaded_img/fashion1.jpg" = "https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800"
    "uploaded_img/fashion2.jpg" = "https://images.unsplash.com/photo-1445205170230-053b83016050?w=800"
    "uploaded_img/fashion3.jpg" = "https://images.unsplash.com/photo-1560243563-062bfc001d68?w=800"
    "uploaded_img/home1.jpg" = "https://images.unsplash.com/photo-1556911220-bff31c812dba?w=800"
    "uploaded_img/home2.jpg" = "https://images.unsplash.com/photo-1523575708161-ad0fc2a9b951?w=800"
    "uploaded_img/home3.jpg" = "https://images.unsplash.com/photo-1523294587484-bae6cc870010?w=800"
    "uploaded_img/book1.jpg" = "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=800"
    "uploaded_img/book2.jpg" = "https://images.unsplash.com/photo-1512820790803-83ca734da794?w=800"
    "uploaded_img/book3.jpg" = "https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=800"
}

# Download all images
$allImages = $aboutImages + $productImages

foreach ($img in $allImages.GetEnumerator()) {
    $outFile = Join-Path $PSScriptRoot $img.Key
    Write-Host "Downloading $($img.Key)..."
    Invoke-WebRequest -Uri $img.Value -OutFile $outFile
    Write-Host "Downloaded $($img.Key)"
}
