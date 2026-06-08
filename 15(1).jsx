import React from "react";

export default function GameCard({ title, genre, platform }) {
  return (
    <div style={styles.card}>
      <h2>{title}</h2>
      <p><b>Жанр:</b> {genre}</p>
      <p><b>Платформа:</b> {platform}</p>
    </div>
  );
}

const styles = {
  card: {
    border: "1px solid #ccc",
    padding: "15px",
    margin: "10px",
    borderRadius: "10px",
    width: "250px",
  },
};