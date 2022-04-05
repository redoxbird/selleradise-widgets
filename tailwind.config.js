module.exports = {
  content: ["./template-parts/**/*.php"],
  important: ".selleradise",
  theme: {
    screens: {
      sm: { max: "767px" },
      md: { min: "768px", max: "1024px" },
      lg: { min: "1025px" },
      sm_md: { max: "1024px" },
      md_lg: { min: "768px" },
    },
    extend: {
      colors: {
        text: {
          100: "rgba(var(--selleradise-color-text-rgb), 0.1)",
          200: "rgba(var(--selleradise-color-text-rgb), 0.2)",
          300: "rgba(var(--selleradise-color-text-rgb), 0.3)",
          700: "rgba(var(--selleradise-color-text-rgb), 0.7)",
          900: "var(--selleradise-color-text)",
        },
        body: {
          100: "rgba(var(--selleradise-color-background-rgb), 0.1)",
          200: "rgba(var(--selleradise-color-background-rgb), 0.2)",
          900: "var(--selleradise-color-background)",
        },
      },
      fontSize: {
        h1: "3.052rem",
        h2: "2.441rem",
        h3: "1.953rem",
        h4: "1.563rem",
        h5: "1.25rem",
        h6: "1rem",
        p: "1rem",
      },
      borderWidth: {
        DEFAULT: "0.1em",
        0: "0",
        1: "0.1em",
        1.5: "0.15em",
        2: "0.2em",
        3: "0.3em",
        4: "0.4em",
        6: "0.6em",
        8: "0.8em",
      },
      spacing: {
        page: "var(--page-padding)",
      },
      gridTemplateRows: {
        8: "repeat(8, minmax(0, 1fr))",
      },

      zIndex: {
        1000: "1000",
        1001: "1001",
      },
      transitionTimingFunction: {
        "out-expo": "cubic-bezier(0.19, 1, 0.22, 1)",
      },
    },
  },
  plugins: [],
};
