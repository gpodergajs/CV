using UnityEngine;
using System.Collections;

public static class Noise {

    // return a grid of values between 0 and 1
    public static float[,] GenerateNoiseMap(int mapWidth, int mapHeight, int seed, float scale, int octaves, float persistance, float lacunarity, Vector2 offset) {

        float[,] noiseMap = new float[mapWidth, mapHeight];

        // if we want the same map again we just use the same seed
        System.Random prng = new System.Random(seed);
        // we want each octave to be sampled from a different location
        Vector2[] octaveOffsets = new Vector2[octaves];
        for (int i = 0; i < octaves; i++) {
            float offsetX = prng.Next(-100000, 100000) + offset.x;
            float offsetY = prng.Next(-100000, 100000) + offset.y;
            octaveOffsets[i] = new Vector2(offsetX, offsetY);
        }

        if (scale <= 0) {
            scale = 0.0001f;
        }

        float maxNoiseHeight = float.MinValue;
        float minNoiseHeight = float.MaxValue;

        float halfWidth = mapWidth / 2f;
        float halfHeight = mapHeight / 2f;

        // loop through grid
        for (int y = 0; y < mapHeight; y++) {
            for (int x = 0; x < mapWidth; x++) {

                // create frequency and amplitude variables
                float amplitude = 1;
                float frequency = 1;
                // keep track of current height value
                float noiseHeight = 0;


                // loop through all of our octaves
                for (int i = 0; i < octaves; i++) {
                    // the higher the frequency the further apart the sample points will be. That means the height values will change more rapidly
                    float sampleX = (x - halfWidth) /*-> when reducing or increasing noise it does it at the center of the map */ / scale * frequency + octaveOffsets[i].x;
                    float sampleY = (y - halfHeight)/*->  when reducing or increasing noise it does it at the center of the map  */ / scale * frequency + octaveOffsets[i].y;

                    // Perlin noise is a procedural texture primitive, a type of gradient noise used by visual effects artists to increase the appearance of realism in computer graphics
                    float perlinValue = Mathf.PerlinNoise(sampleX, sampleY) * 2 - 1; // * 2 -1 -> so that it can be in the range of negative one to one
                    //increase the noise height of each octave
                    noiseHeight += perlinValue * amplitude;
                    amplitude *= persistance; // decreases each octave
                    frequency *= lacunarity; // increases each octave (is greater than 1)
                }

                if (noiseHeight > maxNoiseHeight) { // selfexplanatory code
                    maxNoiseHeight = noiseHeight; // updates noise height
                }
                else if (noiseHeight < minNoiseHeight) {
                    minNoiseHeight = noiseHeight; // updates to the new min noise height
                }

                noiseMap[x, y] = noiseHeight;

            }
        }
        // loop through all of the noise height values again
        for (int y = 0; y < mapHeight; y++) {
            for (int x = 0; x < mapWidth; x++) {
                noiseMap[x, y] = Mathf.InverseLerp(minNoiseHeight, maxNoiseHeight, noiseMap[x, y]); // returns a value of zero or one (inverseLerp). So if our noise map value is equall to the min noise height it will terun zero, if it is half way it will return .5 etc
            }
        }
        return noiseMap;
    }

}
