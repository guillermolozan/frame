module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      colors: {
        primary: '#065f99',
        secondary: '#A8E9F7',
        tertiary:'#00cbfe',
      },
    },
  },
  variants: {},
  corePlugins: {
    container: false
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
          maxWidth: '100%',
          '@screen lg': {
            maxWidth: '980px',
          },
          '@screen xl': {
            maxWidth: '980px',
          },
        }
      })
    }
  ]
}
