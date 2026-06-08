import React from "react";

export default function Header() {
  return (
    <header style={styles.header}>
      <h1>🎮 Список комп’ютерних ігор</h1>
    </header>
  );
}

const styles = {
  header: {
    backgroundColor: "#222",
    color: "white",
    padding: "15px",
    textAlign: "center",
  },
};