import React from "react";
import Header from "./components/Header";
import GameCard from "./components/GameCard";
import Footer from "./components/Footer";

function App() {
  return (
    <div>
      <Header />

      <div style={styles.container}>
        <GameCard
          title="Minecraft"
          genre="Sandbox"
          platform="PC"
        />

        <GameCard
          title="GTA V"
          genre="Action"
          platform="PC / PS / Xbox"
        />

        <GameCard
          title="The Witcher 3"
          genre="RPG"
          platform="PC / PS / Xbox"
        />
      </div>

      <Footer />
    </div>
  );
}

const styles = {
  container: {
    display: "flex",
    justifyContent: "center",
    flexWrap: "wrap",
  },
};

export default App;