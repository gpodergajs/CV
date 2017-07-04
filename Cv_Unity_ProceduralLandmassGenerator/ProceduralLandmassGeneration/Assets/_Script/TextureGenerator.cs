using UnityEngine;
using System.Collections;

public class TextureGenerator {

    // create texture out of a onedimensional color map
    public static Texture2D TextureFromColourMap(Color[] colourMap, int width, int height) {

        Texture2D texture = new Texture2D(width, height);
        texture.filterMode = FilterMode.Point; // fixes bluriness
        texture.wrapMode = TextureWrapMode.Clamp;
        texture.SetPixels(colourMap);
        texture.Apply();
        return texture;
    }

    // get texture based on a 2D height map
    public static Texture2D TextureFromHeightMap(float[,] heightMap) {

        int width = heightMap.GetLength(0);
        int height = heightMap.GetLength(1);

        Texture2D texture = new Texture2D(width, height);

        // set colour of each of the pixels
        Color[] colourMap = new Color[width * height]; // result of this is a 1D colour map
        for (int y = 0; y < height; y++) {
            for (int x = 0; x < width; x++) {
                // y * width -> get row , x -> get column
                colourMap[y * width + x] = Color.Lerp(Color.black, Color.white, heightMap[x, y]);
            }
        }

        return TextureFromColourMap(colourMap, width,height);

        /*
        // apply upper colours to pixels
        texture.SetPixels(colourMap);
        texture.Apply();
        */
    }

}

