module.exports = {
    theme: {
        extend: {
          colors: {
            primary: "var(--primary)",
            secondary: "var(--secondary)",
            main: "var(--main)",
            accent: "var(--accent)",
            
          },
          fonts:{
              primary_font: 'var(--primary-font)',
          }
        },
      },
    plugins: [
      require('postcss-import'),
      require('postcss-simple-vars')({ variables: { version: 'BJB'+Math.floor(Math.random() * 102051) } }),
      require('tailwindcss'),
      require('autoprefixer')/* ,
*/
    ]
  }