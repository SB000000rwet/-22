import React from "react";

export default function Footer() {
  return (
    <footer style={styles.footer}>
      <p>© 2026 Game Library</p>
    </footer>
  );
}

const styles = {
  footer: {
    marginTop: "20px",
    padding: "10px",
    textAlign: "center",
    backgroundColor: "#222",
    color: "white",
  },
};