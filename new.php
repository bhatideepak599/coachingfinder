<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Style for the small div containers */
    .small-div {
      border: 1px solid #ccc;
      margin: 10px;
      padding: 10px;
      text-align: center;
      cursor: pointer;
    }

    .small-div:hover {
      background-color: #f0f0f0;
    }

    img {
      max-width: 100%;
      height: auto;
      display: none; /* Hide the image tag when using background-image */
    }
  </style>
  <title>Dynamic Divs</title>
</head>
<body>

<div id="big-container">
  <!-- Dynamic small div containers will be added here -->
</div>

<script>
  // Array containing data for each small div
  const divDataArray = [
    {
      imageSrc: 'reviews.png',
      heading: 'Div 1',
      content: 'Content for Div 1'
    },
    // ... (repeat for divs 2 to 25)
    {
      imageSrc: 'hawa-mahal.png',
      heading: 'Div 26',
      content: 'Content for Div 26'
    }
  ];

  // Reference to the big container
  const bigContainer = document.getElementById('big-container');

  // Loop through the divDataArray to create dynamic small divs
  for (let i = 0; i < divDataArray.length; i++) {
    const divData = divDataArray[i];

    // Create a new small div element
    const smallDiv = document.createElement('div');
    smallDiv.classList.add('small-div');

    // Set background image using the image source
    smallDiv.style.backgroundImage = `url(${divData.imageSrc})`;

    // Create a heading element
    const heading = document.createElement('h3');
    heading.textContent = divData.heading;

    // Create a paragraph element for content
    const content = document.createElement('p');
    content.textContent = divData.content;

    // Append heading and content to the small div
    smallDiv.appendChild(heading);
    smallDiv.appendChild(content);

    // Append the small div to the big container
    bigContainer.appendChild(smallDiv);

    // Add click event listener to each small div
    smallDiv.addEventListener('click', () => {
      // You can perform actions when a small div is clicked
      console.log(`Clicked on ${divData.heading}`);
    });
  }
</script>

</body>
</html>
