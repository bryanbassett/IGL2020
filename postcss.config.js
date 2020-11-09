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
      require('tailwindcss'),
      require('autoprefixer')/* ,
*/
    ]
  }